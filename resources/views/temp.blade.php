@if (session('resent'))                       
    {{ __('A fresh mail has been sent to your email address.') }}                    
@endif
{!! $content1 !!}
