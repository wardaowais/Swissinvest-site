<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'role',
        'gender',
        'age',
        'country',
        'city',
        'language',
        'profile_pic',
        'phone',
        'zip_code',
        'postal_code',
        'Speaking_Languages',
        'address',
        'fees',
        'service_type',
        'speciality',
        'specialties',
        'sxpertise',
        'Access_info',
        'healthcare_professional_info',
        'about_me',
        'payment_method',
        'latitude',
        'longitude',
        'otp',
        'is_online',
        'is_active',
        'token',
        'status',
        'title',
        'house_number',
        'hin_email',
        'fax_phone_number',
        'fax_number',
        'reviwes',
        'patient_status',
        'boost_end_at',
        'is_boosted',
        'web_url',
        'institute_id',
        'zefix_ide',
        'extension_code',
        'wallet',
        'sms_reminder',
        'sms_confirmation'
    ];
    public function country()
    {
        return $this->belongsTo(Country::class, 'country');
    }
    public function language()
    {
        return $this->belongsTo(Language::class, 'language');
    }
    public function specialty()
    {
        return $this->belongsTo(Specialty::class, 'specialties');
    }
    public function disease()
    {
        return $this->belongsTo(Disease::class, 'speciality');
    }
    public function expertiseRelation()
    {
        return $this->belongsTo(Expertise::class, 'sxpertise');
    }
    
    public function cityRelation()
    {
        return $this->belongsTo(City::class, 'city');
    }
    
    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }

    public function initiatedChats()
    {
        return $this->hasMany(Chat::class, 'caller_id', 'id');
    }

    public function receivedChats()
    {
        return $this->hasMany(Chat::class, 'receiver_id', 'id');
    }
    public function timeSlots()
    {
        return $this->hasMany(TimeSlot::class);
    }

    public function admins()
    {
        return $this->hasMany(Chat::class, 'user_id');
    }
    public function feedbacks()
    {
        return $this->hasMany(FeedbackMember::class, 'user_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }
    public function Verifications()
    {
        return $this->hasMany(Verification::class, 'user_id');
    }
    public function advertises()
    {
        return $this->hasMany(Advertise::class);
    }

    public function sentMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'sender_id', 'id');
    }

    public function receivedMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'receiver_id', 'id');
    }
    public function jobPosts(): HasMany
    {
        return $this->hasMany(JobPost::class, 'receiver_id', 'id');
    }


    public function hostedGroups()
    {
        return $this->hasMany(MemberGroup::class, 'host_id');
    }

    /**
     * Get all the member groups where the user is a member.
     */
    public function memberGroups()
    {
        return $this->hasMany(MemberGroup::class, 'user_id');
    }
    public function favoritesByPatients()
    {
        return $this->hasMany(FavoriteDoctor::class, 'doctor_id');
    }

}
