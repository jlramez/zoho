@section('title', __('Persons'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Clients Listing </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Params">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Params
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.params.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 

                                <th>Person id</th>
                                <th>Person code</th>
                                <th>Person name</th>
								<th>Cards</th>
                                <th>beginTime</th>
                                <th>endTime</th>
                                <th>ACCIONES</th>
							</tr>
						</thead>
						<tbody>
							@foreach($persons['data']['list'] as $row)
							<tr>
                                <td>{{ $row['personId'] ?? 'sin dato'}}</td>
                                <td>{{ $row['personCode'] ?? 'sin dato'}}</td>
                                <td>{{ $row['personName'] ?? 'sin dato'}}</td>
								<td>								
									<span class="badge bg-secondary">{{ $row['cards'][0]['cardNo'] ?? 'sin dato'}}</span>						
								</td>								
                                <td>{{ $row['beginTime'] ?? 'sin dato'}}</td>
                                <td>{{ $row['endTime'] ?? 'sin dato'}}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Actions
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item"  ><i class="fa fa-edit"></i> Edit </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Param id ? \nDeleted Params cannot be recovered!')||event.stopImmediatePropagation()" ><i class="fa fa-trash"></i> Delete </a></li>  
										</ul>
									</div>								
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>						
					<div class="float-end">&nbsp</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>