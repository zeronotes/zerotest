@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	</button>
	<strong>Lỗi cmnr!</strong>
	<ul>
	@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach	
	</ul>
</div>
@endif