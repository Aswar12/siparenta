<?php

namespace App\Http\Livewire\Pegawai;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\butir;
use App\Models\Kegiatan;
use App\Models\User;
use App\Models\Fungsional;
class Show extends Component
{
    public $cari, $kegiatan, $nama_pegawai, $search, $butir, $username, $email, $nip, $peran, $password;
    protected $queryString = ['search'];
    public $nama_fungsional, $fungsional_cari, $pegawaiId;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete'];
    public $isOpen = 0;
    protected $kegiatans;
    public $paginate = 5;
    use WithPagination;
    public function render()
    {
        $data = Fungsional::where('nama_fungsional', 'like', '%'.$this->fungsional_cari.'%')->orWhere('id', 'like', '%'.$this->fungsional_cari.'%')->get();
        $cari = $this->search;
        $pegawais = $this->search == null ? 
         User::with(['fungsional'])->paginate($this->paginate) :
         User::with(['fungsional'])->where('name', 'like', '%'. $this->search .'%')
         ->orWhere('email', 'like', '%'. $this->search .'%')
         ->orWhere('username', 'like', '%'.$this->search.'%')
         ->orWhere('nip', 'like', '%'.$this->search.'%')
         ->orWhere('peran', 'like', '%'.$this->search.'%')
         ->paginate($this->paginate);
        return view('livewire.pegawai.show',['data' => $data, 'pegawais' => $pegawais, ]);
    }
    public function OpenModal()
    {
        $this->isOpen=true;
       
    }
    public function closemodal()
    {
        $this->isOpen = false;
    }
    public function freshinput(){

        $this->nama_pegawai = '';
        $this->fungsional_cari = '';
        $this->username = '';
        $this->email = '';
        $this->peran= ''; 
        $this->nip = '';
     }

     public function simpan(){
        // dd($this);
        $this->validate([
            'nama_pegawai' => 'required',
            'fungsional_cari' => 'required',
            'username' => 'required',
            'email' => 'required',
            'peran' => 'required',
            'nip' => 'required',

            ]);
         
        
        $user = User::where('id', $this->pegawaiId)->first();
        if (!$user) {
            $user = new User();    
        }
        $user->name = $this->nama_pegawai;
        $user->username = $this->username;
        $user->id_fungsional = $this->fungsional_cari;
        $user->email = $this->email;
        $user->nip = $this->nip;
        $user->peran = $this->peran;
        $user->password = bcrypt($this->password);
        $user->save();

        // User::updateOrCreate(
        //     ['id' => $this->pegawaiId],
        //     [
        //         'id_fungsional' => $this->fungsional_cari,
        //         'name' => $this->nama_pegawai,
        //         'username' => $this->username,
        //         'email' => $this->email,
        //         'nip' => $this->nip,
        //         'peran' => $this->peran,
        //         'password' => bcrypt('password'),
        //     ]); 
       
            $this->dispatchBrowserEvent('save',[
                'title' => 'Berhasil',
                'type' => 'success',
                'icon' => 'success',
                'timer' => 3000,
                'text' =>'Pegawai berhasil disimpan',              
            ] );
            $this->freshinput();
      
          $this->closemodal();
          //redirect
    
    }
    public function edit($id){
        
        
        $this->OpenModal(); 
        $useredit = User::findOrfail($id);
        $this->pegawaiId = $id;
        $this->nama_pegawai = $useredit->name;
        $this->fungsional_cari = $useredit->id_fungsional;
        $this->username = $useredit->username;
        $this->email = $useredit->email;
        $this->nip = $useredit->nip;
        $this->peran = $useredit->peran;

        
    }

    public function deleteConfirmation($id)
    {
        $pegawai = User::findOrFail($id);
        $this->dispatchBrowserEvent('confirmDelete', [
            'title' => 'Perhatian',
            'icon' => 'warning',
            'iconColor'=> 'red',
            'text' =>'Apakah Anda Yakin Menghapus Pegawai '. $pegawai->name .' ?',
            'id' => $id,
        ]);
    }
    public function delete($id)
    {
        $pegawai = User::findOrFail($id);
        $pegawai->delete();
       
    }
    
}
