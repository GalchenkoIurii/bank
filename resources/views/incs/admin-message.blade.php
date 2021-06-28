@if(!empty($site_settings['admin_message']->__('value')))
    <div class="block-arror" id="blockArror">
        <p class="block-arror__text">{{ $site_settings['admin_message']->__('value') }}</p>
        <a href="#" id="exitArror"><img src="{{ asset('img/str-two/block-right/exit-1.svg') }}" alt=""></a>
    </div>
@endif