<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Param;
use Ramsey\Uuid\UuidInterface;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class Params extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $code, $redirect_url, $client_id, $client_secret, $grant_type, $refresh_token;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.params.view', [
            'params' => Param::latest()
						->orWhere('code', 'LIKE', $keyWord)
						->orWhere('redirect_url', 'LIKE', $keyWord)
						->orWhere('client_id', 'LIKE', $keyWord)
						->orWhere('client_secret', 'LIKE', $keyWord)
						->orWhere('grant_type', 'LIKE', $keyWord)
						->orWhere('refresh_token', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->code = null;
		$this->redirect_url = null;
		$this->client_id = null;
		$this->client_secret = null;
		$this->grant_type = null;
		$this->refresh_token = null;
    }

    public function store()
    {
        $this->validate([
		'code' => 'required',
		'redirect_url' => 'required',
		'client_id' => 'required',
		'client_secret' => 'required',
		'grant_type' => 'required',
		'refresh_token' => 'required',
        ]);
        Param::create([ 
			'id' => Uuid::uuid4()->toString(),
            'code' => $this-> code,
			'redirect_url' => $this-> redirect_url,
			'client_id' => $this-> client_id,
			'client_secret' => $this-> client_secret,
			'grant_type' => $this-> grant_type,
			'refresh_token' => $this-> refresh_token
			
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Param Successfully created.');
    }

    public function edit($id)
    {
        $record = Param::findOrFail($id);
        $this->selected_id = $id; 
		$this->code = $record-> code;
		$this->redirect_url = $record-> redirect_url;
		$this->client_id = $record-> client_id;
		$this->client_secret = $record-> client_secret;
		$this->grant_type = $record-> grant_type;
		$this->refresh_token = $record-> refresh_token;
    }

    public function update()
    {
        $this->validate([
		'code' => 'required',
		'redirect_url' => 'required',
		'client_id' => 'required',
		'client_secret' => 'required',
		'grant_type' => 'required',
		'refresh_token' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Param::find($this->selected_id);
            $record->update([ 
			'code' => $this-> code,
			'redirect_url' => $this-> redirect_url,
			'client_id' => $this-> client_id,
			'client_secret' => $this-> client_secret,
			'grant_type' => $this-> grant_type,
			'refresh_token' => $this-> refresh_token
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Param Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Param::where('id', $id)->delete();
        }
    }
}