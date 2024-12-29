<?php

namespace App\Http\Controllers;

use App\Events\ChatMessage;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Country;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
class MessageController extends Controller
{
    public function userChat($feature)
        {
            $admin = auth()->user();
            $user = $admin->user;

            // Get the latest messages where the user is either the sender or the receiver
            $messages = Message::where('sender_id', $user->id)
                        ->orWhere('receiver_id', $user->id)
                        ->orderBy('created_at', 'desc')
                        ->get()
                        ->unique(function ($item) use ($user) {
                            return $item->sender_id == $user->id ? $item->receiver_id : $item->sender_id;
                        });

            return view('chat', compact('user', 'messages'));
        }


        public function chatFriends($encryptedUserId = null, $feature = null)
        {
            // dd($encryptedUserId, $feature);
            $admin = auth()->user();
            $user = $admin->user;

            // Retrieve the list of unique chat partners
            $messages = Message::where('sender_id', $user->id)
                ->orWhere('receiver_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get()
                ->unique(function ($item) use ($user) {
                    return $item->sender_id == $user->id ? $item->receiver_id : $item->sender_id;
                });

            if ($encryptedUserId) {
                if (filter_var($encryptedUserId, FILTER_VALIDATE_INT)) {
                    return redirect()->route('match.details', encrypt($encryptedUserId));
                }
                try {
                    $partnerId = decrypt($encryptedUserId);
                    $chatuser = User::find($partnerId);

                    if (!$chatuser) {
                        abort(404, 'User not found');
                    }

                    // Retrieve chat history with the selected partner
                    $chatHistory = Message::where(function ($query) use ($user, $partnerId) {
                        $query->where('sender_id', $user->id)->where('receiver_id', $partnerId);
                    })->orWhere(function ($query) use ($user, $partnerId) {
                        $query->where('sender_id', $partnerId)->where('receiver_id', $user->id);
                    })->orderBy('created_at', 'asc')->get();

                    return view('chat', compact('user', 'messages', 'chatuser', 'chatHistory'));
                } catch (\Exception $e) {
                    return abort(404, 'Page not found');
                }
            } else {
                return view('chat', compact('user', 'messages'));
            }
        }

        public function sendMessage(Request $request)
        {
            $user = auth()->user();

            // Check if receiver_id is present

            if (!$request->has('receiver_id')) {
                return response()->json(['success' => false, 'message' => 'Receiver ID is required'], 400);
            }

            // Decrypt the receiver ID and check if it's valid
            try {
                $receiverId = decrypt($request->receiver_id);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => 'Invalid receiver ID'], 400);
            }

            $messageText = $request->message;

            // Check if the message text is not empty
            if (empty($messageText)) {
                return response()->json(['success' => false, 'message' => 'Message text cannot be empty'], 400);
            }

            // Store the message in the database
            $message = Message::create([
                'sender_id' => $user->user->id,
                'receiver_id' => $receiverId,
                'message' => $messageText,
            ]);

            event(new ChatMessage($message));

            // Send the message to Firebase
            $firebaseData = [
                'sender_id' => $user->id,
                'receiver_id' => $receiverId,
                'message' => $messageText,
                'created_at' => now()->toDateTimeString(),
            ];

            /*Http::post('https://firestore.googleapis.com/v1/projects/doctor-directory-f1fdd/databases/(default)/documents/messages', [
                'fields' => [
                    'sender_id' => ['integerValue' => $firebaseData['sender_id']],
                    'receiver_id' => ['integerValue' => $firebaseData['receiver_id']],
                    'message' => ['stringValue' => $firebaseData['message']],
                    'created_at' => ['timestampValue' => $firebaseData['created_at']],
                ],
            ]);

            // Get receiver's device token
            $receiver = User::find($receiverId);
            $deviceToken = $receiver->device_token;

            // Send push notification if the receiver has a device token
            if ($deviceToken) {
                $this->sendPushNotification($deviceToken, $messageText);
            }*/

            return response()->json(['success' => true, 'message' => $message]);
        }



}
