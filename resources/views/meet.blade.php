<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Hey Pal call</title>
    <style>
        #meet iframe {
            min-height: 100vh;
        }
    </style>
</head>
<body style="padding: 0; margin: 0;">
<div id="meet" style="min-height: 100vh;width: 100%;"></div>
<script src="https://meet.visiocall.ch/external_api.js"></script>
<?php if ($create) : ?>
<script>
    const domain = "meet.visiocall.ch";
    const options = {
        roomName: '{{ $room }}',
        userInfo: {
            email: '',
            displayName: '{{ $name }}',
        },
        width: '100%',
        height: '100%',
        parentNode: document.getElementById("meet"),
        configOverwrite: {
            disableDeepLinking: true,
            disableSimulcast: true,
            maxFullResolutionParticipants: -1,
            constraints: {
                video: {
                    height: {
                        ideal: 720,
                        max: 720,
                        min: 240
                    }
                }
            },

            localRecording: {
                enabled: true,
                format: 'wav'
            },
        },

        interfaceConfigOverwrite: {
            filmStripOnly: false,
            BRAND_WATERMARK_LINK: '',
            DEFAULT_BACKGROUND: '#FFFFFF',
            HIDE_DEEP_LINKING_LOGO: true,
            DISABLE_JOIN_LEAVE_NOTIFICATIONS: true,
            DISABLE_PRESENCE_STATUS: true,
            DISABLE_VIDEO_BACKGROUND: true,
            HIDE_INVITE_MORE_HEADER: true,
            MOBILE_APP_PROMO: false,
            SHOW_BRAND_WATERMARK: false,
            SHOW_JITSI_WATERMARK: false,
            SHOW_WATERMARK_FOR_GUESTS: false,
            SHOW_POWERED_BY: false,
            SHOW_CHROME_EXTENSION_BANNER: false,
            AUTHENTICATION_ENABLE: false,
            NATIVE_APP_NAME: 'Allomed',
            SHOW_PROMOTIONAL_CLOSE_PAGE: false,
            TOOLBAR_ALWAYS_VISIBLE: true,
            ENFORCE_NOTIFICATION_AUTO_DISMISS_TIMEOUT: 5000,
            TOOLBAR_BUTTONS: [
                'microphone', 'camera', 'desktop', 'fullscreen', 'etherpad', 'participants-pane',
                'profile', 'chat', 'recording', 'sharedvideo', 'settings', 'videoquality',
                'invite', 'stats', 'tileview', 'mute-everyone', 'security', 'select-background', 'hangup', 'help', 'toggle-camera', 'videoquality'
            ],
        }
    };
    let api = new JitsiMeetExternalAPI(domain, options);
    // api.executeCommand('setVideoQuality', 360);
    api.executeCommand('avatarUrl', '<?= $avatar ?>');
    api.on('videoConferenceLeft', (params) => {
        $.ajax({
    url: '{{ route("reject.call") }}',
    type: 'POST',
    data: {
        _token: '{{ csrf_token() }}'
    },
    success: function(response) {
        if (response.success) {
            // window.location.href = 'http://127.0.0.1:8000/dashboard';
        } else {
            // Handle the case where the response is not successful
        }
    },
    error: function(xhr, status, error) {
        console.error(error);
    }
});
        api.dispose();
        window.close();
    });

    // use: readyToClose event
    // api.on('readyToClose ', function() {
    //     api.dispose();
    //     window.close();
    // })
</script>
<?php else : ?>
    <script>
        const domain = "meet.visiocall.ch";
        const options = {
            roomName: '{{ $room }}',
            userInfo: {
                displayName: '{{ $name }}',
                email: '',
            },
            width: '100%',
            height: '100%',
            parentNode: document.getElementById("meet"),
            configOverwrite: {
                disableDeepLinking: true,
                disableInviteFunctions: true,
                doNotStoreRoom: true,
                remoteVideoMenu: {
                    disableKick: true
                },
                disableRemoteMute: true,
                enableInsecureRoomNameWarning: false,
                lockRoomGuestEnabled: true,
                roomPasswordNumberOfDigits: 10,
                disableSimulcast: true,
                maxFullResolutionParticipants: -1,
                constraints: {
                    video: {
                        height: {
                            ideal: 720,
                            max: 720,
                            min: 240
                        }
                    }
                },
            },

            interfaceConfigOverwrite: {
                filmStripOnly: false,
                BRAND_WATERMARK_LINK: '',
                DEFAULT_BACKGROUND: '#FFFFFF',
                DISABLE_JOIN_LEAVE_NOTIFICATIONS: true,
                DISABLE_PRESENCE_STATUS: true,
                DISABLE_VIDEO_BACKGROUND: true,
                HIDE_INVITE_MORE_HEADER: true,
                SHOW_CHROME_EXTENSION_BANNER: false,
                SHOW_JITSI_WATERMARK: false,
                SHOW_PROMOTIONAL_CLOSE_PAGE: false,
                TOOLBAR_ALWAYS_VISIBLE: true,
                MOBILE_APP_PROMO: false,
                NATIVE_APP_NAME: 'Allomed',
                ENFORCE_NOTIFICATION_AUTO_DISMISS_TIMEOUT: 2000,
                TOOLBAR_BUTTONS: [
                    'microphone', 'camera',  'raisehand', 'tileview', 'chat','fullscreen', 'videoquality'
                ],
            }
        }
        let api = new JitsiMeetExternalAPI(domain, options);
        //api.addListener('displayNameChange', () => {
        //    api.executeCommand('displayName', '<?= $name ?>//');
        //})
        api.executeCommand('avatarUrl', '<?= $avatar ?>');
        api.on('videoConferenceLeft', (params) => {
           

            api.dispose();
            window.close();
        });
        api.executeCommand('role', 'guest');
        api.executeCommand('participantRoleChanged', 'participant');
    </script>
<?php endif; ?>
</body>
</html>
