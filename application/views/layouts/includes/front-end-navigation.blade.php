<ul>
	<li><a href="{{ base_url() }}">Home</a></li>
	<li><a href="{{ base_url('volunteer/new') }}">Word vrijwilliger</a></li>
	<li><a href="mailto:info@activisme.be">Contact</a></li>

	@if ($this->user)
		<li><a href="{{ base_url('backend') }}">Back-end</a></li>
		<li><a href="{{ base_url('authencation/logout') }}">Uitloggen</a></li>
	@else
		<li><a href="{{ base_url('authencation/login') }}">Log-in</a></li>
		<li><a href="{{ base_url('authencation/register') }}">Register</a></li>
	@endif
</ul>
