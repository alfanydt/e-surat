<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Department;
use App\Models\Letter;
use App\Models\Sender;
use App\Models\Lembur;
use App\Models\Daftar;
use App\Models\Blokir;
use App\Models\Jaminan;
use App\Models\Sewa;
// use App\Traits\PDF;
use App\Helpers\terbilang;
use Carbon\Carbon;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class LetterController extends Controller
{
    // use PDF;

    public function index()
    {
        // $letters = Letter::all();
        // $departments = Department::all();
        // $senders = Sender::all();

        // return view('letters.index', compact('letters', 'departments', 'senders'));
    }

    // public function preview()
    // {
    //     return view('pages.admin.letter.preview');
    // }

    // public function preview(Request $request)
    // {
    //     $data = $request->all();
    //     return view('letters.preview', compact('data'));
    // }
    // use PDF;

    // public function generatePDF(Request $request)
    // {
    //     $data = json_decode($request->input('data'), true);
    //     $pdf = Pdf::loadView('letters.pdf', compact('data'));
    //     return $pdf->download('surat.pdf');
    // }

    public function printLembur(Request $request)
    {
       // Validasi data
       $request->validate([
        'letter_date' => 'required|date',
        'recipient' => 'required|string',
        'address' => 'required|string',
        'sender_name' => 'required|string',
        'sender_position' => 'required|string',
        'overtime_reason' => 'required|string',
        'employee_details' => 'required|string',
        'approval1' => 'required|string',
        'approval1_position' => 'required|string',
        'approval2' => 'required|string',
        'approval2_position' => 'required|string',
        'approval3' => 'required|string',
        'approval3_position' => 'required|string',
    ]);

    // Menyimpan data ke database
    $lembur = Lembur::create([
        'letter_date' => $request->letter_date,
        'recipient' => $request->recipient,
        'address' => $request->address,
        'sender_name' => $request->sender_name,
        'sender_position' => $request->sender_position,
        'overtime_reason' => $request->overtime_reason,
        'employee_details' => $request->employee_details,
        'approval1' => $request->approval1,
        'approval1_position' => $request->approval1_position,
        'approval2' => $request->approval2,
        'approval2_position' => $request->approval2_position,
        'approval3' => $request->approval3,
        'approval3_position' => $request->approval3_position,
    ]);

    // Ambil data untuk ditampilkan di halaman preview
    $data = $lembur->toArray();
    dd($data);
    return view('pages.admin.letter.print-lembur', compact('data'));
    }

    public function printDaftar(Request $request)
    {
        // Validasi data
        $request->validate([
            'letter_no' => 'required|string',
            'letter_date' => 'required|date',
            'location' => 'required|string',
            'regarding' => 'required|string',
            'attachment' => 'nullable|string',
            'recipient_name' => 'required|string',
            'recipient_address' => 'required|string',
            'sender_name' => 'required|string',
            'sender_position' => 'required|string',
            'sender_address' => 'required|string',
            'collateral_description' => 'required|string',
            'auction_date' => 'required|date',
            'cc' => 'nullable|string',
        ]);

        // Menyimpan data ke database
        $daftar = Daftar::create([
            'letter_no' => $request->letter_no,
            'letter_date' => $request->letter_date,
            'location' => $request->location,
            'regarding' => $request->regarding,
            'attachment' => $request->attachment,
            'recipient_name' => $request->recipient_name,
            'recipient_address' => $request->recipient_address,
            'sender_name' => $request->sender_name,
            'sender_position' => $request->sender_position,
            'sender_address' => $request->sender_address,
            'collateral_description' => $request->collateral_description,
            'auction_date' => $request->auction_date,
            'cc' => $request->cc,
        ]);

        // Ambil data untuk ditampilkan di halaman preview
        $data = $daftar->toArray();

        return view('pages.admin.letter.print-daftar', compact('data'));
    }

    // public function printDaftar(Request $request)
    // {
    //     $data = $request->all();
    //     $formattedDate = date('d F Y', strtotime($data['letter_date']));
    //     $data['formatted_date'] = $formattedDate;

    //     return view('pages.admin.letter.print-daftar', compact('data'));
    // }


    public function printPemblokiran(Request $request)
    {
        // Validasi data
        $request->validate([
            'letter_no' => 'required|string',
            'letter_date' => 'required|date',
            'lamp' => 'required|string',
            'regarding' => 'required|string',
            'recipient_name' => 'required|string',
            'recipient_address' => 'required|string',
            'sender_name' => 'required|string',
            'sender_position' => 'required|string',
            'sender_address' => 'required|string',
            'vehicle_details' => 'required|string',
            'cc' => 'nullable|string',
        ]);

        // Menyimpan data ke database
        $blokir = Blokir::create($request->all());

        // Ambil data untuk ditampilkan di halaman preview
        $data = $blokir->toArray();

        return view('pages.admin.letter.print-blokir', compact('data'));
    }

    // public function printPemblokiran(Request $request)
    // {
    //     $data = $request->all();
    //     $formattedDate = date('d F Y', strtotime($data['letter_date']));
    //     $data['formatted_date'] = $formattedDate;

    //     return view('pages.admin.letter.print-blokir', compact('data'));
    // }

    // app/Http/Controllers/LetterController.php

    // app/Http/Controllers/LetterController.php

    public function printJaminan(Request $request)
{
    // Validasi data
    $request->validate([
        'letter_no' => 'required|string',
        'letter_date' => 'required|date',
        'sender_name' => 'required|string',
        'sender_position' => 'required|string',
        'sender_address' => 'required|string',
        'shm_number' => 'required|string',
        'shm_area' => 'required|string',
        'shm_location' => 'required|string',
        'shm_owner' => 'required|string',
    ]);

    // Simpan data ke database
    Jaminan::create($request->all());

    // Ambil data untuk ditampilkan di halaman preview
    $data = $request->all();

    return view('pages.admin.letter.print-jaminan', compact('data'));
}

    // protected function numberToWords($number)
    // {
    //     $units = ['', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan'];
    //     $words = '';
        
    //     if ($number == 0) {
    //         return 'nol';
    //     }
        
    //     if ($number < 10) {
    //         return $units[$number];
    //     }

    //     if ($number < 100) {
    //         if ($number < 20) {
    //             return $this->numberToWords($number - 10) . ' belas';
    //         }
    //         return $units[intval($number / 10)] . ' puluh ' . $units[$number % 10];
    //     }

    //     if ($number < 1000) {
    //         if ($number < 200) {
    //             return 'seratus ' . $this->numberToWords($number - 100);
    //         }
    //         return $units[intval($number / 100)] . ' ratus ' . $this->numberToWords($number % 100);
    //     }

    //     if ($number < 10000) {
    //         if ($number < 2000) {
    //             return 'seribu ' . $this->numberToWords($number - 1000);
    //         }
    //         return $units[intval($number / 1000)] . ' ribu ' . $this->numberToWords($number % 1000);
    //     }

    //     return $words;
    // }
    function terbilang($angka) {
        $angka = (int) $angka;
        $bilangan = array(
            '0' => '',
            '1' => 'Satu',
            '2' => 'Dua',
            '3' => 'Tiga',
            '4' => 'Empat',
            '5' => 'Lima',
            '6' => 'Enam',
            '7' => 'Tujuh',
            '8' => 'Delapan',
            '9' => 'Sembilan',
        );
        $result = '';
        if ($angka < 10) {
            $result = $bilangan[$angka];
        } elseif ($angka < 20) {
            $result = $bilangan[$angka - 10] . ' Belas';
        } elseif ($angka < 100) {
            $result = $bilangan[(int) ($angka / 10)] . ' Puluh ' . $bilangan[$angka % 10];
        } elseif ($angka < 1000) {
            $result = $bilangan[(int) ($angka / 100)] . ' Ratus ' . terbilang($angka % 100);
        } elseif ($angka < 1000000) {
            $result = $bilangan[(int) ($angka / 1000)] . ' Ribu ' . terbilang($angka % 1000);
        }
        return $result;
    }

    // public function printSewa(Request $request)
    // {
    //     $data = $request->all();
    //     return view('pages.admin.letter.print-sewa', compact('data'));
    // }
    public function printSewa(Request $request)
{
    // Validasi data
    $request->validate([
        'letter_no' => 'required|string',
        'letter_date' => 'required|date',
        'first_party_name' => 'required|string',
        'first_party_address' => 'required|string',
        'first_party_nik' => 'required|string',
        'second_party_name' => 'required|string',
        'second_party_address' => 'required|string',
        'second_party_position' => 'required|string',
        'second_party_nik' => 'required|string',
        'vehicle_type' => 'required|string',
        'vehicle_brand' => 'required|string',
        'vehicle_model' => 'required|string',
        'vehicle_year' => 'required|string',
        'vehicle_color' => 'required|string',
        'vehicle_engine_size' => 'required|string',
        'vehicle_frame_no' => 'required|string',
        'vehicle_engine_no' => 'required|string',
        'vehicle_bpkb_no' => 'required|string',
        'vehicle_plate_no' => 'required|string',
        'vehicle_owner' => 'required|string',
        'vehicle_owner_address' => 'required|string',
    ]);

    // Simpan data ke database
    Sewa::create($request->all());

    // Ambil data untuk ditampilkan di halaman preview
    $data = $request->all();

    return view('pages.admin.letter.print-sewa', compact('data'));
}

public function arsip()
{
    $lembur = Lembur::all();
    return view('pages.admin.letter.arsip', compact('lembur')); // Arahkan ke blade arsip.blade.php
}
public function printArsip($id)
{
    $lembur = Lembur::findOrFail($id); // Jangan gunakan findOrFail dulu untuk debugging

    if (!$lembur) {
        // Kembalikan pesan error jika tidak ditemukan
        return redirect()->back()->withErrors('Data surat tidak ditemukan');
    }

    // Coba gunakan dd() untuk melihat isi dari $lembur
    // dd($lembur);
    $data = $lembur->toArray();

    // return view('pages.admin.letter.arsip', compact('lembur'));
    return view('pages.admin.letter.print-lembur', compact('data'));
}


public function arsipBlokir()
{
    $blokir = Blokir::all();
    return view('pages.admin.letter.arsip-blokir', compact('blokir'));
}

public function printArsipBlokir($id)
{
    $blokir = Blokir::findOrFail($id);
    $data = $blokir->toArray();
    return view('pages.admin.letter.print-blokir', compact('data'));
}


public function arsipDaftar()
{
    $daftar = Daftar::all();
    return view('pages.admin.letter.arsip-daftar', compact('daftar')); 
}

public function printArsipDaftar($id)
{
    $daftar = Daftar::findOrFail($id);
    $data = $daftar->toArray();
    return view('pages.admin.letter.print-daftar', compact('data'));
}


public function arsipJaminan()
{
    $jaminan = Jaminan::all();
    return view('pages.admin.letter.arsip-jaminan', compact('jaminan')); 
}
public function printArsipJaminan($id)
{
    $jaminan = Jaminan::findOrFail($id);
    $data = $jaminan->toArray();
    return view('pages.admin.letter.print-jaminan', compact('data'));
}

public function arsipSewa()
{
    $sewa = Sewa::all();
    return view('pages.admin.letter.arsip-sewa', compact('sewa')); 
}

public function printArsipSewa($id)
{
    $sewa = Sewa::findOrFail($id);
    $data = $sewa->toArray();
    return view('pages.admin.letter.print-sewa', compact('data'));
}

    // public function printPemblokiran(Request $request)
    // {
    //     $data = $request->all();

    //     // Proses data kendaraan dari textarea menjadi array key-value
    //     $vehicleDetails = explode("\n", $request->input('vehicle_details'));
    //     $vehicleDetailsArray = [];
    //     foreach ($vehicleDetails as $detail) {
    //         $parts = explode(":", $detail, 2);
    //         if (count($parts) == 2) {
    //             $vehicleDetailsArray[] = ['key' => trim($parts[0]), 'value' => trim($parts[1])];
    //         }
    //     }
    //     $data['vehicle_details'] = $vehicleDetailsArray;

    //     return view('pages.admin.letter.print-blokir', compact('data'));
    // }


    public function showLetter($id)
    {
        $data = [
            'letter_date' => '2024-07-12',
        ];

        Carbon::setLocale('id'); // Set locale bahasa Indonesia
        $data['formatted_date'] = Carbon::parse($data['letter_date'])->format('j F Y');

        return view('pages.admin.letter.print-lembur', compact('data'));
    }
    public function cetak()
    {
        // masih belum bisa
        return view('pages.admin.letter.lembur');
    }
    public function create()
    {
        $departments = Department::all();
        $senders = Sender::all();

        return view('pages.admin.letter.create',[
            'departments' => $departments,
            'senders' => $senders,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'letter_no' => 'required',
            'letter_date' => 'required',
            'date_received' => 'required',
            'regarding' => 'required',
            'department_id' => 'required',
            'sender_id' => 'required',
            'letter_file' => 'required|mimes:pdf|file',
            'letter_type' => 'required',
        ]);

        if($request->file('letter_file')){
            $validatedData['letter_file'] = $request->file('letter_file')->store('assets/letter-file');
        }

        if ($validatedData['letter_type'] == 'Surat Masuk') {
            $redirect = 'surat-masuk';
        } else {
            $redirect = 'surat-keluar';
        }

        Letter::create($validatedData);

        return redirect()
                    ->route($redirect)
                    ->with('success', 'Sukses! 1 Data Berhasil Disimpan');
    } 
        // $validated = $request->validate([
        //     'letter_date' => 'required|date',
        //     'to' => 'required|string|max:255',
        //     'sender_name' => 'required|string|max:255',
        //     'sender_position' => 'required|string|max:255',
        //     'letter_body' => 'required|string',
        //     'approval' => 'required|string|max:255',
        //     'approval_position' => 'required|string|max:255',
        //     'file' => 'nullable|file|mimes:pdf|max:2048',
        // ]);
    
        // $filePath = null;
        // if ($request->hasFile('file')) {
        //     $filePath = $request->file('file')->store('letters');
        // }
    
        // $letter = Letter::create([
        //     'letter_date' => $validated['letter_date'],
        //     'to' => $validated['to'],
        //     'sender_name' => $validated['sender_name'],
        //     'sender_position' => $validated['sender_position'],
        //     'letter_body' => $validated['letter_body'],
        //     'approval' => $validated['approval'],
        //     'approval_position' => $validated['approval_position'],
        //     'file' => $filePath,
        // ]);
    
        // return redirect()->route('letter.preview', $letter->id);
        
        
        
        
        

    public function incoming_mail()
    {
        if (request()->ajax()) {
            $query = Letter::with(['department','sender'])->where('letter_type', 'Surat Masuk')->latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-success btn-xs" href="' . route('detail-surat', $item->id) . '">
                            <i class="fa fa-search-plus"></i> &nbsp; Detail
                        </a>
                        <a class="btn btn-primary btn-xs" href="' . route('letter.edit', $item->id) . '">
                            <i class="fas fa-edit"></i> &nbsp; Ubah
                        </a>
                        <form action="' . route('letter.destroy', $item->id) . '" method="POST" onsubmit="return confirm('."'Anda akan menghapus item ini dari situs anda?'".')">
                            ' . method_field('delete') . csrf_field() . '
                            <button class="btn btn-danger btn-xs">
                                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                            </button>
                        </form>
                    ';
                })
                ->editColumn('post_status', function ($item) {
                   return $item->post_status == 'Published' ? '<div class="badge bg-green-soft text-green">'.$item->post_status.'</div>':'<div class="badge bg-gray-200 text-dark">'.$item->post_status.'</div>';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action','post_status'])
                ->make();
        }

        return view('pages.admin.letter.incoming');
    }

    //tambahan sementara
    // public function preview($id)
    // {
    //     $letter = Letter::findOrFail($id);
    //     return view('letter.preview', compact('letter'));
    // }

    // public function edit($id)
    // {
    //     $letter = Letter::findOrFail($id);
    //     return view('letter.edit', compact('letter'));
    // }

    public function outgoing_mail()
    {
        if (request()->ajax()) {
            $query = Letter::with(['department','sender'])->where('letter_type', 'Surat Keluar')->latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-success btn-xs" href="' . route('detail-surat', $item->id) . '">
                            <i class="fa fa-search-plus"></i> &nbsp; Detail
                        </a>
                        <a class="btn btn-primary btn-xs" href="' . route('letter.edit', $item->id) . '">
                            <i class="fas fa-edit"></i> &nbsp; Ubah
                        </a>
                        <form action="' . route('letter.destroy', $item->id) . '" method="POST" onsubmit="return confirm('."'Anda akan menghapus item ini dari situs anda?'".')">
                            ' . method_field('delete') . csrf_field() . '
                            <button class="btn btn-danger btn-xs">
                                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                            </button>
                        </form>
                    ';
                })
                ->editColumn('post_status', function ($item) {
                   return $item->post_status == 'Published' ? '<div class="badge bg-green-soft text-green">'.$item->post_status.'</div>':'<div class="badge bg-gray-200 text-dark">'.$item->post_status.'</div>';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action','post_status'])
                ->make();
        }

        return view('pages.admin.letter.outgoing');
    }

    public function show($id)
    {
        $item = Letter::with(['department','sender'])->findOrFail($id);

        return view('pages.admin.letter.show',[
            'item' => $item,
        ]);
    }

    public function edit($id)
    {
        $item = Letter::findOrFail($id);
        $departments = Department::all();
        $senders = Sender::all();

        return view('pages.admin.letter.edit',[
            'departments' => $departments,
            'senders' => $senders,
            'item' => $item,
        ]);
    }

    public function download_letter($id)
    {
        $item = Letter::findOrFail($id);

        return Storage::download($item->letter_file);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'letter_no' => 'required',
            'letter_date' => 'required',
            'date_received' => 'required',
            'regarding' => 'required',
            'department_id' => 'required',
            'sender_id' => 'required',
            'disposisi' => 'required',
            'letter_file' => 'mimes:pdf|file',
            'letter_type' => 'required',
        ]);

        $item = Letter::findOrFail($id);

        if($request->file('letter_file')){
            $validatedData['letter_file'] = $request->file('letter_file')->store('assets/letter-file');
        }

        if ($validatedData['letter_type'] == 'Surat Masuk') {
            $redirect = 'surat-masuk';
        } else {
            $redirect = 'surat-keluar';
        }

        $item->update($validatedData);

        return redirect()
                    ->route($redirect)
                    ->with('success', 'Sukses! 1 Data Berhasil Diubah');
        
        
    //     $letter = Letter::findOrFail($id);

    // $validated = $request->validate([
    //     'letter_date' => 'required|date',
    //     'to' => 'required|string|max:255',
    //     'sender_name' => 'required|string|max:255',
    //     'sender_position' => 'required|string|max:255',
    //     'letter_body' => 'required|string',
    //     'approval' => 'required|string|max:255',
    //     'approval_position' => 'required|string|max:255',
    //     'file' => 'nullable|file|mimes:pdf|max:2048',
    // ]);

    // $filePath = $letter->file;
    // if ($request->hasFile('file')) {
    //     if ($filePath) {
    //         Storage::delete($filePath);
    //     }
    //     $filePath = $request->file('file')->store('letters');
    // }

    // $letter->update([
    //     'letter_date' => $validated['letter_date'],
    //     'to' => $validated['to'],
    //     'sender_name' => $validated['sender_name'],
    //     'sender_position' => $validated['sender_position'],
    //     'letter_body' => $validated['letter_body'],
    //     'approval' => $validated['approval'],
    //     'approval_position' => $validated['approval_position'],
    //     'file' => $filePath,
    // ]);

    // return redirect()->route('letter.preview', $letter->id);
    }

    public function destroy($id)
    {
        $item = Letter::findorFail($id);

        if ($item->letter_type == 'Surat Masuk') {
            $redirect = 'surat-masuk';
        } else {
            $redirect = 'surat-keluar';
        }

        Storage::delete($item->letter_file);

        $item->delete();

        return redirect()
                    ->route($redirect)
                    ->with('success', 'Sukses! 1 Data Berhasil Dihapus');
    }
    // use PDF;

    // public function download($id)
    // {
    //     $letter = Letter::findOrFail($id);
    //     $pdf = PDF::loadView('letter.pdf', compact('letter'));
    //     return $pdf->download('Surat_Permohonan_Upah_Lembur.pdf');
    // }

}

//     public function lembur()
//     {
//         if (request()->ajax()) {
//             $query = Letter::with(['department', 'sender'])->where('letter_type', 'Permohonan Upah Lembur')->latest()->get();

//             return DataTables::of($query)
//                 ->addColumn('action', function ($item) {
//                     return '
//                         <a class="btn btn-success btn-xs" href="' . route('detail-surat', $item->id) . '">
//                             <i class="fa fa-search-plus"></i> &nbsp; Detail
//                         </a>
//                         <a class="btn btn-primary btn-xs" href="' . route('letter.edit', $item->id) . '">
//                             <i class="fas fa-edit"></i> &nbsp; Ubah
//                         </a>
//                         <form action="' . route('letter.destroy', $item->id) . '" method="POST" onsubmit="return confirm('."'Anda akan menghapus item ini dari situs anda?'".')">
//                             ' . method_field('delete') . csrf_field() . '
//                             <button class="btn btn-danger btn-xs">
//                                 <i class="far fa-trash-alt"></i> &nbsp; Hapus
//                             </button>
//                         </form>
//                     ';
//                 })
//                 ->editColumn('post_status', function ($item) {
//                     return $item->post_status == 'Published' ? '<div class="badge bg-green-soft text-green">'.$item->post_status.'</div>' : '<div class="badge bg-gray-200 text-dark">'.$item->post_status.'</div>';
//                 })
//                 ->addIndexColumn()
//                 ->removeColumn('id')
//                 ->rawColumns(['action', 'post_status'])
//                 ->make();
//         }

//         return view('pages.admin.letter.lembur');
//     }
// }



// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\Department;
// use App\Models\Letter;
// use App\Models\Sender;
// use Yajra\DataTables\Facades\DataTables;
// use Illuminate\Support\Facades\Storage;
// use Barryvdh\DomPDF\Facade as PDF;

// class LetterController extends Controller
// {
//     public function index()
//     {
//         //
//     }

//     public function create()
//     {
//         $departments = Department::all();
//         $senders = Sender::all();

//         return view('pages.admin.letter.create', [
//             'departments' => $departments,
//             'senders' => $senders,
//         ]);
//     }

//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'letter_no' => 'required',
//             'letter_date' => 'required',
//             'date_received' => 'required',
//             'regarding' => 'required',
//             'department_id' => 'required',
//             'sender_id' => 'required',
//             'letter_file' => 'required|mimes:pdf|file',
//             'letter_type' => 'required',
//         ]);

//         if ($request->file('letter_file')) {
//             $validatedData['letter_file'] = $request->file('letter_file')->store('assets/letter-file');
//         }

//         $letter = Letter::create($validatedData);

//         return redirect()
//             ->route($letter->letter_type == 'Surat Masuk' ? 'surat-masuk' : 'surat-keluar')
//             ->with('success', 'Sukses! 1 Data Berhasil Disimpan');
//     }

//     public function incoming_mail()
//     {
//         if (request()->ajax()) {
//             $query = Letter::with(['department', 'sender'])->where('letter_type', 'Surat Masuk')->latest()->get();

//             return Datatables::of($query)
//                 ->addColumn('action', function ($item) {
//                     return '
//                         <a href="' . route('letter.download', $item->id) . '" class="btn btn-primary btn-sm">Download</a>
//                     ';
//                 })
//                 ->rawColumns(['action'])
//                 ->make(true);
//         }

//         return view('pages.admin.letter.incoming');
//     }

//     public function outgoing_mail()
//     {
//         if (request()->ajax()) {
//             $query = Letter::with(['department','sender'])->where('letter_type', 'Surat Keluar')->latest()->get();

//             return Datatables::of($query)
//                 ->addColumn('action', function ($item) {
//                     return '
//                         <a class="btn btn-success btn-xs" href="' . route('detail-surat', $item->id) . '">
//                             <i class="fa fa-search-plus"></i> &nbsp; Detail
//                         </a>
//                         <a class="btn btn-primary btn-xs" href="' . route('letter.edit', $item->id) . '">
//                             <i class="fas fa-edit"></i> &nbsp; Ubah
//                         </a>
//                         <form action="' . route('letter.destroy', $item->id) . '" method="POST" onsubmit="return confirm('."'Anda akan menghapus item ini dari situs anda?'".')">
//                             ' . method_field('delete') . csrf_field() . '
//                             <button class="btn btn-danger btn-xs">
//                                 <i class="far fa-trash-alt"></i> &nbsp; Hapus
//                             </button>
//                         </form>
//                     ';
//                 })
//                 ->editColumn('post_status', function ($item) {
//                    return $item->post_status == 'Published' ? '<div class="badge bg-green-soft text-green">'.$item->post_status.'</div>':'<div class="badge bg-gray-200 text-dark">'.$item->post_status.'</div>';
//                 })
//                 ->addIndexColumn()
//                 ->removeColumn('id')
//                 ->rawColumns(['action','post_status'])
//                 ->make();
//         }

//         return view('pages.admin.letter.outgoing');
//     }

//     public function edit($id)
//     {
//         $item = Letter::findOrFail($id);
//         $departments = Department::all();
//         $senders = Sender::all();

//         return view('pages.admin.letter.edit', [
//             'departments' => $departments,
//             'senders' => $senders,
//             'item' => $item,
//         ]);
//     }

//     public function download_letter($id)
//     {
//         $letter = Letter::findOrFail($id);
//         $pdf = PDF::loadView('letters.pdf', compact('letter'));
//         return $pdf->download('surat-' . $letter->letter_no . '.pdf');
//     }

//     public function update(Request $request, $id)
//     {
//         $validatedData = $request->validate([
//             'letter_no' => 'required',
//             'letter_date' => 'required',
//             'date_received' => 'required',
//             'regarding' => 'required',
//             'department_id' => 'required',
//             'sender_id' => 'required',
//             'letter_file' => 'mimes:pdf|file',
//             'letter_type' => 'required',
//         ]);

//         $item = Letter::findOrFail($id);

//         if ($request->file('letter_file')) {
//             $validatedData['letter_file'] = $request->file('letter_file')->store('assets/letter-file');
//         }

//         $item->update($validatedData);

//         return redirect()
//             ->route($item->letter_type == 'Surat Masuk' ? 'surat-masuk' : 'surat-keluar')
//             ->with('success', 'Sukses! 1 Data Berhasil Diubah');
//     }

//     public function destroy($id)
//     {
//         $item = Letter::findorFail($id);

//         Storage::delete($item->letter_file);
//         $item->delete();

//         return redirect()
//             ->route($item->letter_type == 'Surat Masuk' ? 'surat-masuk' : 'surat-keluar')
//             ->with('success', 'Sukses! 1 Data Berhasil Dihapus');
//     }
// }

