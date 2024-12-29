<h2>Enable Two-Factor Authentication</h2>
<p>Scan this QR code with your Google Authenticator app:</p>
<img src="{{ $QR_Image }}" alt="QR Code">
<p>Or manually enter this key: {{ Auth::user()->google2fa_secret }}</p>
