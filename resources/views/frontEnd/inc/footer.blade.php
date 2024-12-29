@php
    $website = \App\Models\Setting::whereUserId($user_id)->first();
@endphp
<footer class="footer bg-light">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-12">
                <div class="text-center text-white footer-alt">
                    <p class="copyright_content mb-0 mt-3">
                        <script>document.write(new Date().getFullYear())</script>
                        {!! optional($website)->footer  ?? "" !!}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
