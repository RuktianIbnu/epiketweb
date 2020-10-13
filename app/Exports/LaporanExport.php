<?php

namespace App\Exports;

use App\model\laporan\laporan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class LaporanExport implements FromView, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $data;

    public function __construct($data)
    {
        $this->$data = $data;
    }

    public function view(): View
    {
        return view('laporan::laporan_pendataan.lap_pendataan', [
            'data' => Laporan::select('pendataan_tamu.id','users.nama as nama_petugas','pendataan_tamu.nama as nama_tamu', 'pendataan_tamu.departement', 'pendataan_tamu.lokasi', 'pendataan_tamu.kategori', 'pendataan_tamu.tanggal_mulai', 'pendataan_tamu.tanggal_selesai', 'pendataan_tamu.start_time', 'pendataan_tamu.end_time', 'pendataan_tamu.efek', 'pendataan_tamu.deskripsi', 'pendataan_tamu.resiko', 'pendataan_tamu.lain_lain')
                    ->join('users', 'pendataan_tamu.id_petugas', 'users.nip')
                    ->get()
        ]);
    }


	public function registerEvents(): array
	{
		return[
			AfterSheet::class 	=>	function(AfterSheet $event){
				$cellRange	= 'A1:W1';
				$event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);

				$styleArray = [
					'font' => [
						'bold' => true,
					],
					'border' => [
						'allBorders' => [
							'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						],
					],
				];

				$lastrow = $event->sheet->getHighestRow();
				$event->sheet->getStyle('H1:E999')->applyFromArray($styleArray)->getAlignment()->setWrapText(true);
			},
		];
	}
}
