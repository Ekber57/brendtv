<?php
namespace App\Services\IpTv;
use App\Models\IpTv\Bouquet;
use App\DTOS\IpTv\BouquetDTO;


class BouquetService {
    public function addBouquet(BouquetDTO $nntvBouquetDTO) {
        Bouquet::create([
            "bouquet_id" => $nntvBouquetDTO->id,
            "name" => $nntvBouquetDTO->name,
            "movies" => $nntvBouquetDTO->movies,
            "radios" => $nntvBouquetDTO->radios,
            "channels" => $nntvBouquetDTO->channels,
            "series" => $nntvBouquetDTO->series,
            "order" => $nntvBouquetDTO->order,
        ]);
    }
}



?>