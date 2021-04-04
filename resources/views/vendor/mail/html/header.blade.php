<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'AcreSaude')
<img src="http://acresaude.com.br/images/logo_name.png" class="logo" alt="AcreSaude Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
