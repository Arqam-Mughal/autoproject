@extends('layout.main')
@section('content')

@php
    $pageTitle = "Contact Us";
@endphp

<x-breadcrumb :pageTitle="$pageTitle"/>

  <div class="contact-page section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>| Contact Us</h6>
            <h2>Get In Touch With Our Agents</h2>
          </div>
          <p>When you really need to download free CSS templates, please remember our website TemplateMo. Also, tell your friends about our website. Thank you for visiting. There is a variety of Bootstrap HTML CSS templates on our website. If you need more information, please contact us.</p>
          <div class="row">
            <div class="col-lg-12">
              <div class="item phone">
                <img src="{{asset('frontend/assets/images/phone-icon.png')}}" alt="" style="max-width: 52px;">
                <h6>010-020-0340<br><span>Phone Number</span></h6>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item email">
                <img src="{{asset('frontend/assets/images/email-icon.png')}}" alt="" style="max-width: 52px;">
                <h6>info@villa.co<br><span>Business Email</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
            <x-alert />
            <form id="contact-form" action="{{ route('contact') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <fieldset>
                            <label for="name">Full Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Your Name..." autocomplete="on" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <label for="email">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" class="form-control @error('subject') is-invalid @enderror" id="subject" placeholder="Subject..." autocomplete="on">
                            @error('subject')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <label for="message">Message</label>
                            <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" placeholder="Your Message">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <button type="submit" id="form-submit" class="orange-button">Send Message</button>
                        </fieldset>
                    </div>
                </div>
            </form>

        </div>
        <div class="col-lg-12">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="500px" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection
