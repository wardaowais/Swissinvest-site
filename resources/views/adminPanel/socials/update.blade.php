@extends('layouts.app')
@section('title','Update Socials Link')
@section('content')
<div class="my-dashboard">
    <br><Br>
    <div class="">
       <div class="row">
     @include('adminPanel.inc.middleSidebar')

    <div class="col-md-9 mt-1" style="margin-top: 10px;">
        <!-- dash content -->
        <div class="row">
            <div class="col-md-12">
            <div class="dash-content mx-3"  style="background: #E8F1F5;padding-top: 7px;border-radius:10px">
            <div class="box border-none" style="padding-bottom: 0;">

                <div class="card-header d-flex justify-content-between align-items-center text-center newcardheader" style="background:#00B2FF;border-radius:12px;height:4pc;margin-top:-10px">
                    <h5 class="text-left" style="margin-top: -1%; text-align: left;">
                        <span style="position: relative; top: 10px; left: 1pc">{{translate('Update Socials Link')}}</span>
                    </h5>
                    <button type="submit" class="btn btn-secondary" style="background: #EB3C3C;position: relative; left: -1pc">{{translate(' Update Socials Link')}}</button>
                </div>
                <div class="container">
                    <form method="post" action="{{route('update-socials-save')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="facebookLink" class="form-label fw-semibold">Facebook Link</label>
                                    <input type="url" name="facebook" class="form-control" id="facebookLink" placeholder="Example: https://www.facebook.com/" value="{{ old('facebook', $social->facebook ?? "") }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="whatsappLink" class="form-label fw-semibold">WhatsApp Link</label>
                                    <input type="url" name="whatsapp" class="form-control" id="whatsappLink" placeholder="Example: https://wa.me/1234567890" value="{{ old('whatsapp', $social->whatsapp?? "") }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="youtubeLink" class="form-label fw-semibold">YouTube Link</label>
                                    <input type="url" name="youtube" class="form-control" id="youtubeLink" placeholder="Example: https://www.youtube.com/" value="{{ old('youtube', $social->youtube?? "") }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="instagramLink" class="form-label fw-semibold">Instagram Link</label>
                                    <input type="url" name="instagram" class="form-control" id="instagramLink" placeholder="Example: https://www.instagram.com/" value="{{ old('instagram', $social->instagram?? "") }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="tiktokLink" class="form-label fw-semibold">TikTok Link</label>
                                    <input type="url" name="tiktok" class="form-control" id="tiktokLink" placeholder="Example: https://www.tiktok.com/" value="{{ old('tiktok', $social->tiktok?? "") }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="telegramLink" class="form-label fw-semibold">Telegram Link</label>
                                    <input type="url" name="telegram" class="form-control" id="telegramLink" placeholder="Example: https://t.me/username" value="{{ old('telegram', $social->telegram?? "") }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="snapchatLink" class="form-label fw-semibold">Snapchat Link</label>
                                    <input type="url" name="snapchat" class="form-control" id="snapchatLink" placeholder="Example: https://www.snapchat.com/" value="{{ old('snapchat', $social->snapchat?? "") }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="twitterLink" class="form-label fw-semibold">Twitter Link</label>
                                    <input type="url" name="twitter" class="form-control" id="twitterLink" placeholder="Example: https://twitter.com/" value="{{ old('twitter', $social->twitter?? "") }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="pinterestLink" class="form-label fw-semibold">Pinterest Link</label>
                                    <input type="url" name="pinterest" class="form-control" id="pinterestLink" placeholder="Example: https://www.pinterest.com/" value="{{ old('pinterest', $social->pinterest?? "") }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center gap-3" style="margin-top:10px;margin-bottom:20px;float:inline-end">
                                    <button class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            </div>
        </div>
        <!-- end dash content -->
    </div>
       </div></div></div>
@endsection
