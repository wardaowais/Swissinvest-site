<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitaion</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f8f0e6; font-family: 'PT Serif', Georgia, serif; color: #00264C;">
    <div style="width: 550px; margin: 0 auto; background-color: #009688; border-radius: 10px; padding: 50px; color: #fff; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);">
        <div style="background-color: #fff; color: #333; padding: 20px; border-radius: 10px;">
            <div style="text-align: center;">
                <img src="https://directory.doctomed.ch/assets/frontend/images/logo.png" alt="Your Logo" style="width: 80px; margin-bottom: 20px;">
            </div>
            <div>
                <p>Dear Dr. {{ $first_name }},</p>
                
                <p>To get you started</p>
                <p>Browse our website at <a href="https://directory.doctomed.ch/" style="display: inline-block; padding: 10px 20px; background-color: #00264C; color: #fff !important; text-decoration: none; border-radius: 5px; font-weight: bold;">https://directory.doctomed.ch/</a>.Click the "Panel Login" button from the website</p>
                <div style="background-color: #f0f0f0; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
                    <p style="margin:10px 0px;"><strong>Username:</strong> {{ $email }}</p>
                    <p style="margin:10px 0px;"><strong>Default Password:</strong> {{ $default_password }}</p>
                </div>
                
                <p><strong><img src="https://cdn-icons-png.flaticon.com/128/10353/10353698.png" height="14" alt=""> Steps to get started:</strong></p>
                <div>
                    <ul style="margin-left: 20px; list-style: none; padding: 0;">
                        <li style="margin-bottom: 10px; font-size: 16px;"><img src="https://cdn-icons-png.flaticon.com/128/10445/10445690.png" height="14" alt=""> Click on the login URL provided above.</li>
                        <li style="margin-bottom: 10px; font-size: 16px;"><img src="https://cdn-icons-png.flaticon.com/128/10445/10445690.png" height="14" alt=""> Enter your username {{ $email }} and the default password.</li>
                        <li style="margin-bottom: 10px; font-size: 16px;"><img src="https://cdn-icons-png.flaticon.com/128/10445/10445690.png" height="14" alt=""> Follow the prompts to update your profile information.</li>
                        <li style="margin-bottom: 10px; font-size: 16px;"><img src="https://cdn-icons-png.flaticon.com/128/10445/10445690.png" height="14" alt=""> Change your password for enhanced security.</li>
                    </ul>
                </div>
                <p><strong><img src="https://cdn-icons-png.flaticon.com/128/10353/10353698.png" height="14" alt=""> Why Join Allomed Doctor Directory?</strong></p>
                <div>
                    <ul style="margin-left: 20px; list-style: none; padding: 0;">
                        <li style="margin-bottom: 10px; font-size: 16px;"><img src="https://cdn-icons-png.flaticon.com/128/10445/10445690.png" height="14" alt=""> <strong>Visibility:</strong> Increase your online presence and reach more patients.</li>
                        <li style="margin-bottom: 10px; font-size: 16px;"><img src="https://cdn-icons-png.flaticon.com/128/10445/10445690.png" height="14" alt=""> <strong>Accessibility:</strong> Allow patients to book appointments with you free of charge.</li>
                        <li style="margin-bottom: 10px; font-size: 16px;"><img src="https://cdn-icons-png.flaticon.com/128/10445/10445690.png" height="14" alt=""> <strong>Accuracy:</strong> Ensure patients have the most accurate information about your practice.</li>
                        <li style="margin-bottom: 10px; font-size: 16px;"><img src="https://cdn-icons-png.flaticon.com/128/10445/10445690.png" height="14" alt=""> <strong>Personal Portfolio:</strong>  Easily create and manage your personal portfolio through our user-friendly dashboard, showcasing your professional achievements and credentials.
                        </li>
                        <li style="margin-bottom: 10px; font-size: 16px;"><img src="https://cdn-icons-png.flaticon.com/128/10445/10445690.png" height="14" alt=""> <strong>Ads: </strong>Promote your services by placing ads directly on the platform, reaching a targeted audience of patients and peers.
                            Hearing Posts: Share your insights and updates with the community by posting in our hearing section, keeping your colleagues and patients informed.
                            </li>
                            <li style="margin-bottom: 10px; font-size: 16px;"><img src="https://cdn-icons-png.flaticon.com/128/10445/10445690.png" height="14" alt=""> <strong>News Portal: </strong>Stay informed with the latest medical news delivered directly to your dashboard, ensuring you are always up to date with industry developments.
                                </li>
                    </ul>
                </div>
                <p>If you encounter any issues or have any questions, please do not hesitate to contact our support team at allomedirectory@gmail.com.</p>
                <p>Thank you for considering our invitation. We look forward to having you as part of the Allomed Doctor Directory community.</p>
                <p>Best regards,</p>
                <p>Caroline DUC<br>
                    Manager<br>
                    Allomed Doctor Directory Team<br>
                    allomedirectory@gmail.com<br>
                    <a href="https://doctors.allomed.ch/" style="color:#00264C;text-decoration:none;">https://doctors.allomed.ch/</a>
                </p>
            </div>
        </div>
        <div style="text-align: center; margin-top: 20px;">
            <p style="font-size: 12px; color: #f8f0e6;">Copyright 2024</p>
            <div style="text-align: center;">
                <a href="#" style="margin: 0 5px;"><img src="https://cdn.pixabay.com/photo/2021/06/15/12/51/facebook-6338507_1280.png" alt="" style="width: 20px;"></a>
                <a href="#" style="margin: 0 5px;"><img src="https://cdn-icons-png.flaticon.com/512/124/124021.png" alt="" style="width: 20px;"></a>
            </div>
        </div>
        <div style="margin-top: 20px; font-size: 12px; color: #f8f0e6; text-align: center;">
            <p>If you continue to have problems, please feel free to contact us at <a href="mailto:allomedirectory@gmail.com" style="color: #ff0054; text-decoration: none;">allomedirectory@gmail.com</a></p>
        </div>
    </div>
</body>
</html>
