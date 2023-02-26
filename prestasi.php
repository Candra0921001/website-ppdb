<div class="container">
        <h4 class="text-primary">Data Orang Tua</h4>
        <hr>
        <div class="bg-white p-4">
            <form action="c_prestasi.php" method="POST">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Nama Siswa :</label>
                    <div class="col-md-10">
                        <input name="nama_siswa" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Nama Prestasi :</label>
                    <div class="col-md-10">
                        <input name="nama_prestasi" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Jenis Lomba :</label>
                    <div class="col-md-10">
                        <input name="jenis_lomba" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Tingkatan :</label>
                    <div class="col-md-2">
                        <select name="tingkatan" class="form-control">
                        <option value="nasional">Nasional</option>
                        <option value="provinsi">Provinsi</option>
                        <option value="kotakab">Kota/Kabupaten</option>
                        </select>
                    </div>
                <br>
                <div class="row mx-auto">
                    <button type="submit" class="btn btn-success ml-auto">Proses Data</button>
                </div>
            </form>
        </div>
    </div>