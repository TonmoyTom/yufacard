<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://yufacard.com/public/front_end/images/logo.png">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
