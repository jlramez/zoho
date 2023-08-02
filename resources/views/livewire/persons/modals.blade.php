<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Param</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="code"></label>
                        <input wire:model="code" type="text" class="form-control" id="code" placeholder="Code">@error('code') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="redirect_url"></label>
                        <input wire:model="redirect_url" type="text" class="form-control" id="redirect_url" placeholder="Redirect Url">@error('redirect_url') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="client_id"></label>
                        <input wire:model="client_id" type="text" class="form-control" id="client_id" placeholder="Client Id">@error('client_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="client_secret"></label>
                        <input wire:model="client_secret" type="text" class="form-control" id="client_secret" placeholder="Client Secret">@error('client_secret') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="grant_type"></label>
                        <input wire:model="grant_type" type="text" class="form-control" id="grant_type" placeholder="Grant Type">@error('grant_type') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="refresh_token"></label>
                        <input wire:model="refresh_token" type="text" class="form-control" id="refresh_token" placeholder="Refresh Token">@error('refresh_token') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updatePersonDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Param</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="code"></label>
                        <input wire:model="personCode" type="text" class="form-control" id="code" placeholder="Code">@error('code') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="redirect_url"></label>
                        <input wire:model="redirect_url" type="text" class="form-control" id="redirect_url" placeholder="Redirect Url">@error('redirect_url') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="client_id"></label>
                        <input wire:model="client_id" type="text" class="form-control" id="client_id" placeholder="Client Id">@error('client_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="client_secret"></label>
                        <input wire:model="client_secret" type="text" class="form-control" id="client_secret" placeholder="Client Secret">@error('client_secret') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="grant_type"></label>
                        <input wire:model="grant_type" type="text" class="form-control" id="grant_type" placeholder="Grant Type">@error('grant_type') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="refresh_token"></label>
                        <input wire:model="refresh_token" type="text" class="form-control" id="refresh_token" placeholder="Refresh Token">@error('refresh_token') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>
