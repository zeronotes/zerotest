@if(session('msg_success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	{{ session('msg_success') }}
</div>
@endif