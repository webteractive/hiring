@component('mail::message')
Hi {{ $application->name }},

We have received your job application for the position of {{ $application->position }}. We will get back to you as soon as we finish reviewing it.
In the meantime, we want to take this opportunity to thank you for the time you spent on checking and applying to our job postings.

Cheers,<br>
{{ config('app.name') }}
@endcomponent