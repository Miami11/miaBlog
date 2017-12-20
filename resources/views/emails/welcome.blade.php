@component('mail::message')
# Introduction

The body of your message.
- Hi there
- two this is greeting email
- three just notice
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

@component('mail::panel', ['url' => ''])
Button Text Lorem ipusj
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
