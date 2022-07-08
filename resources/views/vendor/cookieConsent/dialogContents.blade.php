<div class="js-cookie-consent cookie-consent">

    <span class="cookie-consent__message">
        {!! trans('cookieConsent::texts.message') !!} Wszystkie informacje można znaleźć w naszej <a href="{{ route('privacyPolicy') }}" target="_blank">Polityce Prywatności</a>
    </span>

    <button class="js-cookie-consent-agree cookie-consent__agree">
        {{ trans('cookieConsent::texts.agree') }}
    </button>

</div>
