<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Daftar BPHTB</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php echo $_POST['FLAG'] ?> BPHTB</span>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" class="back" id="tab-0">
                        <i class="blue"></i>
                        <strong> Daftar BPHTB </strong>
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:;" data-toggle="tab" aria-expanded="true" id="tab-1">
                        <i class="blue"></i>
                        <strong><?php echo $_POST['FLAG'] ?> BPHTB </strong>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content no-border">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet blue box menu-panel">
                        <div class="portlet-title">
                            <div class="caption"><?php echo $_POST['FLAG'] ?> BPHTB</div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="form-horizontal">
                                <div class="row">
                                    <!-- start subject -->
                                    <div class="form-group">
                                        <label class="control-label col-md-2" id="keterangan-kurang-bayar">  </label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2"> A. Subjek Pajak </label>
                                        <label class="control-label col-md-4" style="text-align: left !important;" id="subject_pajak" name="subject_pajak"></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Nama
                                        </label>
                                        <div class="col-md-3">
                                            <input type="hidden" class="form-control" name="t_bphtb_registration_id" id="t_bphtb_registration_id">
                                            <input type="text" class="form-control" maxlength="64" name="wp_name" id="wp_name" >
                                            <input type="hidden" class="form-control" name="p_bphtb_type_id" id="p_bphtb_type_id">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">NPWP
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" maxlength="32" name="npwp" id="npwp">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Alamat
                                        </label>
                                        <div class="col-md-4">
                                            <textarea rows="4" cols="50" class="form-control" maxlength="256"  name="wp_address_name" id="wp_address_name"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">No Telp
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" maxlength="32" name="phone_no" id="phone_no">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">No Hp
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" maxlength="32" name="mobile_phone_no" id="mobile_phone_no">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">RT/RW
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <input type="text" class="form-control" maxlength="10" name="wp_rt" id="wp_rt">
                                                <span class="input-group-addon"> / </span>
                                                <input type="text" class="form-control" maxlength="10" name="wp_rw" id="wp_rw">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Kota/Kabupaten
                                        </label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="hidden" class="form-control required" maxlength="8" name="wp_p_region_id" id="wp_p_region_id" readonly>
                                                <input type="text" class="form-control required" name="wp_kota" id="wp_kota" readonly>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-success" type="button" id="btn-lov-kota-subjek">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">kecamatan
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="hidden" class="form-control required" name="wp_p_region_id_kec" maxlength="8" id="wp_p_region_id_kec" readonly>
                                                <input type="text" class="form-control required" name="wp_kecamatan" id="wp_kecamatan" readonly>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-success" type="button" id="btn-lov-kecamatan-subjek">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Kelurahan
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="hidden" class="form-control required" name="wp_p_region_id_kel" maxlength="8" id="wp_p_region_id_kel" readonly>
                                                <input type="text" class="form-control required" name="wp_kelurahan" id="wp_kelurahan" readonly>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-success" type="button" id="btn-lov-kelurahan-subjek">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End subject -->

                                    <!-- start Objek -->
                                    <div class="form-group">
                                        <label class="control-label col-md-2 " > B. Objek Pajak </label>
                                        <label class="control-label col-md-4" style="text-align: left !important;" id="objek_pajak" name="objek_pajak"></label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">No Objek Pajak
                                        </label>
                                        <div class="col-md-4">
                                            <div class="input-group ">
                                                <input type="text" class="form-control required" maxlength="48" name="njop_pbb" id="njop_pbb">
                                                <input type="hidden" class="form-control"  name="t_bphtb_registration_id_old" id="t_bphtb_registration_id_old">
                                                (Pilih Data BPHTB Sebelumnya)
                                                <span class="input-group-btn">
                                                    <button class="btn btn-success" type="button" id="btn-lov-njop-old">PILIH
                                                    </button>
                                                </span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Letak Tanah dan atau Bangunan
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" maxlength="128" name="object_letak_tanah" id="object_letak_tanah">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">RT/RW
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <input type="text" class="form-control" maxlength="10" name="object_rt" id="object_rt">
                                                <span class="input-group-addon"> / </span>
                                                <input type="text" class="form-control" maxlength="10" name="object_rw" id="object_rw">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Kota/Kabupaten
                                        </label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="hidden" class="form-control required" maxlength="10" name="object_p_region_id" id="object_p_region_id" readonly>
                                                <input type="text" class="form-control required" name="object_kota" id="object_kota" readonly>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-success" type="button" id="btn-lov-kota-objek">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">kecamatan
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="hidden" class="form-control required" maxlength="10" name="object_p_region_id_kec" id="object_p_region_id_kec" readonly>
                                                <input type="text" class="form-control required" name="object_kecamatan" id="object_kecamatan" readonly>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-success" type="button" id="btn-lov-kecamatan-objek">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Kelurahan
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="hidden" class="form-control required" maxlength="10" name="object_p_region_id_kel" id="object_p_region_id_kel" readonly>
                                                <input type="text" class="form-control required" name="object_kelurahan" id="object_kelurahan" readonly>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-success" type="button" id="btn-lov-kelurahan-objek">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Dokumen Pendukung
                                        </label>
                                        <div class="col-md-3">
                                           <div id="comboDocPendukung"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" maxlength="100" name="bphtb_legal_doc_description" id="bphtb_legal_doc_description">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="hidden" class="form-control" name="nilai_doc" id="nilai_doc">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Potongan
                                        </label>
                                        <div class="col-md-2">
                                            <div class="input-group ">
                                                <input type="text" class="form-control formatRight" name="add_disc_percent" onkeyup="hitungTotalTanah();return 1;" id="add_disc_percent" value="0" onfocus="changeNull(this)" onfocusout="changeZero(this)">
                                                <span class="input-group-addon">% </span>
                                            </div>
                                        </div>
                                        <label class="control-label col-md-6 col-md-offset-2">(Gunakan tanda "."(titik) untuk luas dengan bilangan pecahan)
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Nilai Tanah (Ref)
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <input type="text" onkeyup="hitungTotalTanah();return 1;" class="form-control formatRight"  readonly="true" maxlength="16" name="land_area_real" id="land_area_real" value="0" >
                                                <span class="input-group-addon" >m2</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" onkeyup="hitungTotalTanah();" maxlength="16" class="form-control priceformat" readonly="true" name="land_price_real" id="land_price_real" value="0" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2"> Nilai bangunan (Ref)
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <input type="text" onkeyup="hitungTotalBangunan();" maxlength="16" class="form-control formatRight"  readonly="true" name="building_area_real" id="building_area_real" value="0">
                                                <span class="input-group-addon" >m2</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" onkeyup="hitungTotalBangunan();" maxlength="16" class="form-control priceformat" readonly="true" name="building_price_real" id="building_price_real" value="0" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2"> Tanah
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <input type="text" onkeyup="hitungTotalTanah();return 1;" maxlength="10"  class="form-control formatRight"   name="land_area" id="land_area" value="0" onfocus="changeNull(this)" onfocusout="changeZero(this)">
                                                <span class="input-group-addon">m2</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" onkeyup="hitungTotalTanah();" maxlength="10" class="form-control priceformat"  name="land_price_per_m" id="land_price_per_m" value="0" onfocus="changeNull(this)" onfocusout="changeZero(this)">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" class="form-control priceformat"  maxlength="16" name="land_total_price" id="land_total_price" value="0" readonly>
                                            </div>
                                        </div>
                                        <label class="control-label col-md-5 col-md-offset-2">(Gunakan tanda "."(titik) untuk luas dengan bilangan pecahan)
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">  Bangunan
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <input type="text" onkeyup="hitungTotalBangunan();"  maxlength="10" class="form-control formatRight"   name="building_area" id="building_area" value="0" onfocus="changeNull(this)" onfocusout="changeZero(this)">
                                                <span class="input-group-addon">m2</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" onkeyup=" hitungTotalBangunan();"  maxlength="10" class="form-control priceformat"  name="building_price_per_m" id="building_price_per_m" value="0" onfocus="changeNull(this)" onfocusout="changeZero(this)">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" class="form-control priceformat"  maxlength="16"  name="building_total_price" id="building_total_price" value="0" readonly>
                                            </div>
                                        </div>
                                        <label class="control-label col-md-5 col-md-offset-2">(Gunakan tanda "."(titik) untuk luas dengan bilangan pecahan)
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-md-offset-2">  Total
                                        </label>
                                        <div class="col-md-3 col-md-offset-4 ">
                                            <div class="input-group ">
                                                <span class="input-group-addon">Rp</span>
                                                <input type="text" class="form-control priceformat"   name="total_price" id="total_price" value="0" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-3 col-md-offset-2">
                                            <select  name="jenis_harga_bphtb" id="jenis_harga_bphtb" class="form-control">
                                                <option value='1' >Harga transaksi</option>
                                                <option value='2' >Harga Pasar</option>
                                                <option value='3' >Harga Lelang</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-md-offset-3 ">
                                            <div class="input-group ">
                                                <span class="input-group-addon">Rp</span>
                                                <input type="text" onkeyup=" getNPOP();" maxlength="16"  class="form-control priceformat"   name="market_price" id="market_price" value="0" onfocus="changeNull(this)" onfocusout="changeZero(this)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2 ">  Potongan Kebijakan untuk Waris
                                        </label>
                                        <div class="col-md-3 ">
                                            <select  name="potongan_waris" id="potongan_waris" class="form-control">
                                                <option value='1/1' >Bukan Waris</option>
                                                <option value='1/2' >1/2</option>
                                                <option value='1/3' >1/3</option>
                                                <option value='2/3' >2/3</option>
                                                <option value='1/4' >1/4</option>
                                                <option value='1/7' >1/7</option>
                                                <option value='3/4' >3/4</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2 ">  Nilai Perolehan Objek Pajak (NPOP)
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" class="form-control priceformat" maxlength="16" readonly  name="npop" id="npop" value="0">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2 ">  Potongan Tambahan
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" class="form-control priceformat"  name="add_discount" id="add_discount" value="0" onfocus="changeNull(this)" onfocusout="changeZero(this)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2 ">  Nilai Perolehan Objek Pajak Tidak Kena Pajak(NPOPTKP)
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" class="form-control priceformat" maxlength="16"  name="npop_tkp" id="npop_tkp" value="0" onfocus="changeNull(this)" onfocusout="changeZero(this)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2 ">  Nilai Perolehan Objek Pajak Kena Pajak(NPOPKP)
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" class="form-control priceformat" maxlength="16" name="npop_kp" id="npop_kp" value="0" onfocus="changeNull(this)" onfocusout="changeZero(this)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2 ">  Bea Perolehan Hak atas Tanah dan Bangunan yang terutang
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" class="form-control priceformat" maxlength="16"  name="bphtb_amt" id="bphtb_amt" value="0" onfocus="changeNull(this)" onfocusout="changeZero(this)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" >
                                        <label class="control-label col-md-2 ">  Potongan
                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" class="form-control priceformat" maxlength="16"  name="bphtb_discount" id="bphtb_discount" value="0" onfocus="changeNull(this)" onfocusout="changeZero(this)">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="description" id="description">
                                        </div>

                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <label class="control-label input-group-addon  ">  Cek Potongan :
                                                </label>
                                                <span class="input-group-addon"><input type="checkbox" class="form-control" name="check_potongan" id="check_potongan"></span>
                                            </div>
                                        </div>
                                        <label class="control-label col-md-5 col-md-offset-6">(Silahkan cheklis utk pembayaran yg ada potongan)
                                        </label>
                                    </div>

                                    <div id="div-harus-bayar" class="form-group" style="display: none">
                                        <label class="control-label col-md-2 " class="control-label col-md-2 ">Bea Perolehan Hak atas Tanah dan Bangunan yang harus dibayar </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="bphtb_amt_final_old" id="bphtb_amt_final_old">
                                        </div>
                                    </div>

                                    <div id="div-pembayaran-sebelumnya" class="form-group" style="display: none">
                                        <label class="control-label col-md-2 " class="control-label col-md-2 ">Nilai Pajak yang sudah dibayar </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="prev_payment_amount" id="prev_payment_amount">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2 " id="total-bayar-text" class="control-label col-md-2 ">Bea Perolehan Hak atas Tanah dan Bangunan yang harus dibayar </label>
                                        <div class="col-md-3">
                                            <div class="input-group ">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text" class="form-control priceformat " maxlength="16" name="bphtb_amt_final" readonly value="0" id="bphtb_amt_final" >
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <a href="javascript:;" class="btn default button-previous back" id="back">
                                                    <i class="fa fa-angle-left"></i> Back </a>
                                                <a href="javascript:;" style="display: none" class="btn btn-outline green button-next" id="printWisnu"> CETAK NOTA VERIFIKASI (INDRA WISNU)
                                                </a>
                                                <a href="javascript:;" class="btn btn-outline green button-next" id="print" onclick="printLaporan(1)" > CETAK NOTA VERIFIKASI
                                                </a>
                                                <a href="javascript:;" class="btn  green " id="update"> Simpan
                                                </a>
                                                <a href="javascript:;" class="btn  green " id="insert"> Simpan
                                                </a>
                                                <a href="javascript:;" class="btn  green " id="delete"> Hapus
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Objek -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('lov/lov_kota'); ?>
<?php $this->load->view('lov/lov_kec'); ?>
<?php $this->load->view('lov/lov_kel'); ?>
<?php $this->load->view('lov/lov_bphtb_ws'); ?>
<!-- First Load -->
<script>

    $.ajax({
            url: "<?php echo base_url().'bphtb_registration/load_combo_dok_pendukung/'; ?>" ,
            type: "POST",
            data: {},
            success: function (data) {
                $( "#comboDocPendukung" ).html( data );
            },
            error: function (xhr, status, error) {
                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
            }
    });

    var FLAG            = '<?php echo $_POST['FLAG']; ?>';
    var p_bphtb_type_id = $('#p_bphtb_type_id').val();


    $(".priceformat").number( true, 0 , '.',','); /* price number format */
    $(".priceformat").css("text-align", "right");

    $(".numberformat").number( true, 0 , '.','.');
    $(".numberformat").css("text-align", "right");
    $(".formatRight").css("text-align", "right");

    function changeNull(param){
        //alert (param);
        var data = param.value;
        if (data==0)
            param.value=null;
    }

    function changeZero(param){
        var data = param.value;
        if (data==null || data=='')
            param.value=0;
    }

    if(FLAG == 'Edit' || FLAG == 'Detail'){

        $.ajax({
            url: '<?php echo WS_JQGRID."transaksi.t_bphtb_registration_list_controller/read_detail_bphtb"; ?>',
            type: "POST",
            dataType: "json",
            data: {
                id: "<?php echo $_POST['id']; ?>"
            },
            success: function (data) {
                if(data.success){
                    var dt = data.items;

                    $('#t_bphtb_registration_id').val(dt.t_bphtb_registration_id);
                    $('#wp_name').val(dt.wp_name);
                    $('#npwp').val(dt.npwp);
                    $('#wp_address_name').val(dt.wp_address_name);
                    $('#wp_rt').val(dt.wp_rt);
                    $('#wp_rw').val(dt.wp_rw);
                    $('#wp_p_region_id').val(dt.wp_p_region_id);
                    $('#wp_kota').val(dt.wp_kota);
                    $('#wp_p_region_id_kec').val(dt.wp_p_region_id_kec);
                    $('#wp_kecamatan').val(dt.wp_kecamatan);
                    $('#wp_p_region_id_kel').val(dt.wp_p_region_id_kel);
                    $('#wp_kelurahan').val(dt.wp_kelurahan);
                    $('#phone_no').val(dt.phone_no);
                    $('#mobile_phone_no').val(dt.mobile_phone_no);
                    $('#njop_pbb').val(dt.njop_pbb);
                    $('#object_letak_tanah').val(dt.object_address_name);
                    $('#object_rt').val(dt.object_rt);
                    $('#object_rw').val(dt.object_rw);
                    $('#object_p_region_id').val(dt.object_p_region_id);
                    $('#object_kota').val(dt.object_region);
                    $('#object_p_region_id_kec').val(dt.object_p_region_id_kec);
                    $('#object_kecamatan').val(dt.object_kecamatan);
                    $('#object_p_region_id_kel').val(dt.object_p_region_id_kel);
                    $('#object_kelurahan').val(dt.object_kelurahan);
                    $('#p_bphtb_legal_doc_type_id').val(dt.p_bphtb_legal_doc_type_id);
                    $('#land_area').val(dt.land_area);
                    $('#land_price_per_m').val(dt.land_price_per_m);
                    $('#land_total_price').val(dt.land_total_price);
                    $('#building_area').val(dt.building_area);
                    $('#building_price_per_m').val(dt.building_price_per_m);
                    $('#building_total_price').val(dt.building_total_price);
                    $('#market_price').val(dt.market_price);
                    $('#npop').val(dt.npop);
                    $('#npop_tkp').val(dt.npop_tkp);
                    $('#npop_kp').val(dt.npop_kp);
                    $('#bphtb_amt').val(dt.bphtb_amt);
                    $('#bphtb_discount').val(dt.bphtb_discount);
                    $('#bphtb_amt_final').val(dt.bphtb_amt_final);
                    $('#description').val(dt.description);
                    $('#jenis_harga_bphtb').val(dt.jenis_harga_bphtb);
                    $('#bphtb_legal_doc_description').val(dt.bphtb_legal_doc_description);
                    $('#add_disc_percent').val(dt.add_disc_percent);
                    $('#p_bphtb_type_id').val(dt.p_bphtb_type_id);
                    $('#add_discount').val(dt.add_discount);
                    $('#total_price').val(Number($('#land_total_price').val())+Number($('#building_total_price').val()));
                    if(dt.check_potongan == 'Y'){
                        $('#check_potongan').attr('checked', true);
                    };
                    $('#land_area_real').val(dt.land_area_real);
                    $('#land_price_real').val(dt.land_price_real);
                    $('#building_area_real').val(dt.building_area_real);
                    $('#building_price_real').val(dt.building_price_real);


                }
                // console.log(dt.product_name);
            },
            error: function (xhr, status, error) {
                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
            }
        });
    }

    if(FLAG == 'Add'){
        $('#print').css('display', 'none');
        $('#update').css('display', 'none');
        $('#delete').css('display', 'none');
        $('#insert').css('display', '');
    }else if(FLAG == 'Edit'){
        $('#print').css('display', '');
        $('#update').css('display', '');
        $('#delete').css('display', 'none');
        $('#insert').css('display', 'none');

        /*$('#print').on('click', function(event){
            printLaporan(1);
        });*/
    }else if(FLAG == 'Detail'){
        $('#print').css('display', 'none');
        $('#update').css('display', '');
        $('#delete').css('display', '');
        $('#insert').css('display', 'none');
    }


    if(p_bphtb_type_id == 3) {
      $('#keterangan-kurang-bayar').css('color', '#008000');
      $('#keterangan-kurang-bayar').css('font-weight', 'bold');
      $('#keterangan-kurang-bayar').css('font-size', '15px');
      $('#keterangan-kurang-bayar').html('DATA DIBAWAH INI MERUPAKAN DATA BPHTB KURANG BAYAR:');

      $('#total-bayar-text').css('color', '#FF0000');
      $('#total-bayar-text').css('font-weight', 'bold');
      $('#total-bayar-text').html('Total Kekurangan Pembayaran');

      $('#bphtb_amt_finale').css('text-align', 'right');
      $('#bphtb_amt_final').css('background', '#FFD345');

      $('#div-harus-bayar').css('display', '');
      $('#div-pembayaran-sebelumnya').css('display', '');

      $("#njop_pbb").prop('disabled', true);
      $("#jenis_harga_bphtb").prop('disabled', true);
      $("#add_disc_percent").prop('disabled', true);


    }
</script>
<!-- /First Load -->

<!-- LOV -->
<script>
    $("#btn-lov-kota-subjek").on('click', function() {
        modal_lov_kota_show('wp_p_region_id','wp_kota');
    });

    $('#wp_p_region_id').on('change', function() {
        $('#wp_p_region_id_kec').val('');
        $('#wp_kecamatan').val('');
        $('#wp_p_region_id_kel').val('');
        $('#wp_kelurahan').val('');
    });

    $("#btn-lov-kecamatan-subjek").on('click', function() {
        var kota = $('#wp_p_region_id').val();
        //alert(kota);
        if( kota == null || kota == ''){
            swal({title: "Error!", text: "Isi Kota/Kabupaten Terlebih Dahulu", html: true, type: "error"});
            return;
        }
         modal_lov_kecamatan_show('wp_p_region_id_kec','wp_kecamatan',kota);

    });

    $('#wp_p_region_id_kec').on('change', function() {
        $('#wp_p_region_id_kel').val('');
        $('#wp_kelurahan').val('');
    });

    $("#btn-lov-kelurahan-subjek").on('click', function() {
        var kec = $('#wp_p_region_id_kec').val();
        if( kec == null || kec == ''){
            swal({title: "Error!", text: "Isi Kecamatan Terlebih Dahulu", html: true, type: "error"});
             return;
        }
        modal_lov_kelurahan_show('wp_p_region_id_kel','wp_kelurahan',kec);
    });



    $("#btn-lov-kota-objek").on('click', function() {
        modal_lov_kota_show('object_p_region_id','object_kota');
    });

    $('#object_p_region_id').on('change', function() {
        $('#object_p_region_id_kec').val('');
        $('#object_kecamatan').val('');
        $('#object_p_region_id_kel').val('');
        $('#object_kelurahan').val('');
    });

    $("#btn-lov-kecamatan-objek").on('click', function() {
        var kota = $('#object_p_region_id').val();
        //alert(kota);
        if( kota == null || kota == ''){
            swal({title: "Error!", text: "Isi Kota/Kabupaten Terlebih Dahulu", html: true, type: "error"});
            return;
        }
         modal_lov_kecamatan_show('object_p_region_id_kec','object_kecamatan',kota);

    });

    $('#object_p_region_id_kec').on('change', function() {
        $('#object_p_region_id_kel').val('');
        $('#object_kelurahan').val('');
    });

    $("#btn-lov-kelurahan-objek").on('click', function() {
        var kec = $('#object_p_region_id_kec').val();
        if( kec == null || kec == ''){
            swal({title: "Error!", text: "Isi Kecamatan Terlebih Dahulu", html: true, type: "error"});
             return;
        }
        modal_lov_kelurahan_show('object_p_region_id_kel','object_kelurahan',kec);
    });


    $('#btn-lov-njop-old').on('click',function(){
        modal_lov_bphtb_ws_show();
    });
</script>
<!-- /LOV -->

<!-- PERHITUNGAN -->

<script>
    function ReplaceNumberWithCommas(yourNumber) {
        var n = yourNumber.toString().split(".");
        n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return n.join(".");
    }


    function hitungNPOPKP(){
        var npotkp = $('#npop_tkp').val().replace(/,/g ,'');
        if(npotkp=='' || npotkp=='undefined'){
                npotkp=0;
        }
        var npokp = $('#npop').val().replace(/,/g ,'');
        if(npokp=='' || npokp=='undefined'){
                npokp=0;
        }
        var add_discount = $('#add_discount').val().replace(/,/g ,'');
        if(add_discount=='' || add_discount=='undefined'){
            add_discount=0;
        }
        if((parseFloat(npokp)-parseFloat(npotkp)-parseFloat(add_discount)) < 0){
            $('#npop_kp').val(ReplaceNumberWithCommas(0));
        }else{
            var result =ReplaceNumberWithCommas(parseFloat(npokp)-parseFloat(npotkp)-parseFloat(add_discount));
            $('#npop_kp').val(result);
        }
        hitungTerutang($('#npop_kp').val().replace(/,/g ,''));
    }


    function hitungTerutang(nilai){
      var terutang = Math.ceil(nilai/100*5);
      $('#bphtb_amt').val(ReplaceNumberWithCommas(terutang));
      hitungPembayaran();
    }


    function hitungPembayaran(){
        var jumlah= $('#bphtb_amt').val().replace(/,/g ,'');
        var diskon= $('#bphtb_discount').val().replace(/,/g ,'');
        if(jumlah=='' || jumlah=='undefined'){
            jumlah=0;
        }

        if(diskon=='' || diskon=='undefined'){
            diskon=0;
        }
        var p_bphtb_type_id = $('#p_bphtb_type_id').val();
        var bphtb_amt_final = $('#bphtb_amt_final').val();
        if(p_bphtb_type_id != 3) {
            if(bphtb_amt_final < 0){
                $('#bphtb_amt_final').val(0);
            }else{
                var result = ReplaceNumberWithCommas(parseInt(jumlah)-parseInt(diskon));
                $('#bphtb_amt_final').val(result);
            }
        }else {
            var bphtb_amt_final_old = $('#bphtb_amt_final_old').val();
            if(bphtb_amt_final_old < 0){
                $('#bphtb_amt_final_old').val(0);
            }else{
                var result = ReplaceNumberWithCommas(parseInt(jumlah)-parseInt(diskon));
                $('#bphtb_amt_final_old').val(result);
            }

            var payment_amount = $('#prev_payment_amount').val().replace(/,/g ,'');
            var nilai_pajak_harus_bayar = $('#bphtb_amt_final_old').val().replace(/,/g ,'');

            var result = ReplaceNumberWithCommas(parseInt(nilai_pajak_harus_bayar)-parseInt(payment_amount));
            $('#bphtb_amt_final').val(result);

        }
    }

    function getNPOP(){
        var waris = $('#potongan_waris').val();
        var res = waris.split("/");
        var market_price =$('#market_price').val().replace(/,/g ,'');
        var total_price =$('#total_price').val().replace(/,/g ,'');
        var total_p  = ReplaceNumberWithCommas(total_price*(res[0]/res[1]));
        var market_p = ReplaceNumberWithCommas(market_price*(res[0]/res[1]));

        if(parseFloat(total_price)>parseFloat(market_price)){
            var components = total_p.toString().split(".");
            $('#npop').val(components[0]);
        }else{
            var components = market_p.toString().split(".");
            $('#npop').val(components[0]);
        }
        var npotkp_cons = $('#nilai_doc').val();
        if(npotkp_cons==''){
            npotkp_cons=0;
        }
        if(npotkp_cons >= 0 && npotkp_cons != ''){
            var npop = $('#npop').val();
            var result = ReplaceNumberWithCommas(Math.ceil((npop).replace(/,/g ,'')*npotkp_cons*res[0]/res[1]));
            $('#npop').val(result);

        }
        var npop = $('#npop').val().replace(/,/g ,'');
        var persen_kurang = $('#add_disc_percent').val()/100;
        if(persen_kurang==''){
                persen_kurang=0;
        }
        var result =ReplaceNumberWithCommas(Math.ceil(npop*persen_kurang));
        $('#add_discount').val(result);
        hitungNPOPKP();
    }

    function hitungTotalTanah(){
      var hasil                 = 0;
      var r_tot_p               = 0;
      var r_l_tot_p             = 0;
      var land_area             = $('#land_area').val();
      var land_price_per_m      = $('#land_price_per_m').val();
      var land_total_price      = $('#land_total_price').val().replace(/,/g ,'');
      var building_total_price  = $('#building_total_price').val().replace(/,/g ,'');

      if(land_area!=0||land_price_per_m!=0){
        hasil = parseFloat(land_area.replace(/,/g ,''))*parseFloat(land_price_per_m.replace(/,/g ,''));
      }

      r_l_tot_p =  ReplaceNumberWithCommas(hasil);
      $('#land_total_price').val(r_l_tot_p);

      r_tot_p = ReplaceNumberWithCommas(parseFloat(r_l_tot_p.replace(/,/g ,''))+parseFloat(building_total_price));
      $('#total_price').val(r_tot_p);

      getNPOP();
      hitungNPOPKP();
    }

    function hitungTotalBangunan(){
        var hasil                = 0;
        var result               = 0;
        var building_area        = $('#building_area').val();
        var building_price_per_m = $('#building_price_per_m').val();
        var building_total_price = $('#building_total_price').val();
        var land_total_price     = $('#land_total_price').val();

        if (building_area != 0 || building_price_per_m != 0){
            hasil = parseFloat(building_area.replace(/,/g ,'')) * parseFloat(building_price_per_m.replace(/,/g ,''));
        }
        hasil = ReplaceNumberWithCommas(hasil);
        $('#building_total_price').val(hasil);

        result = ReplaceNumberWithCommas(parseFloat(land_total_price.replace(/,/g ,'')) + parseFloat(hasil.replace(/,/g ,'')));
        $('#total_price').val(result);

        getNPOP();
    }

</script>

<!-- /PERHITUNGAN -->

<!-- Function Pendukung -->

<script>

    function getdok(dok){
        //alert(dok.value);
        var id = dok.value;
        $.ajax({
            url: "<?php echo base_url().'bphtb_registration/call_service_doc'; ?>" ,
            type: "POST",
            data: {
                id : id
            },
            dataType: "json",
            success: function (data) {
                var dt = data[0];
                console.log (dt);

                var total_price = $('#total_price').val().replace(/,/g ,'');
                var market_price = $('#market_price').val().replace(/,/g ,'');

                var doc_cons = dt.doc_cons;
                var npoptkp = dt.npoptkp;

                if(doc_cons > 0 && doc_cons != '' ){
                    var npop = $('#npop').val().replace(/,/g ,'');
                    var result = ReplaceNumberWithCommas(doc_cons*(npop).replace(/,/g ,''));

                    $('#npop_tkp').val(result);
                    $('#nilai_doc').val(doc_cons);

                    if(parseFloat(total_price)>parseFloat(market_price)){
                        result = ReplaceNumberWithCommas(Math.ceil(total_price*doc_cons));
                        $('#npop').val(result);
                    }else{
                        result = ReplaceNumberWithCommas(Math.ceil(market_price*doc_cons));
                        $('#npop').val(result);
                    }

                }else{
                    if(parseFloat(total_price)>parseFloat(market_price)){
                        var result = ReplaceNumberWithCommas(Math.ceil(total_price));
                        $('#npop').val(result);
                    }else{
                        var result = ReplaceNumberWithCommas(Math.ceil(market_price));
                        $('#npop').val(result);
                    }
                    $('#nilai_doc').val(null);
                }
                $('#npop_tkp').val(ReplaceNumberWithCommas(npoptkp));
                hitungNPOPKP();
            },
            error: function (xhr, status, error) {
                swal({title: "Error!", text: xhr.responseText, html: true, type: "error"});
                $('#npop_tkp').val(0);
                hitungNPOPKP();
            }
        });
    }


    function openInNewTab(url) {
        window.open(url, 'No Payment', 'left=0,top=0,width=500,height=500,toolbar=no,scrollbars=yes,resizable=yes');
    }

    function printLaporan(pejabat){
        //alert(pejabat);
        var params          = $('#t_bphtb_registration_id').val();
        var p_bphtb_type_id = $('#p_bphtb_type_id').val();
        params              = params +"&pejabat="+pejabat;
        //alert(params);

        if(p_bphtb_type_id == 3) {
            //window.open("../report/cetak_rep_bphtb_kb.php?t_bphtb_registration_id="+params, "_blank", "toolbar=0,location=0,menubar=0");
            url = "<?php echo base_url(); ?>"+"cetak_rep_bphtb_kb/pageCetak?t_bphtb_registration_id="+params;
            openInNewTab(url);
        }else {
            //window.open("../report/cetak_rep_bphtb.php?t_bphtb_registration_id="+params, "_blank", "toolbar=0,location=0,menubar=0");
            url = "<?php echo base_url(); ?>"+"cetak_rep_bphtb/pageCetak?t_bphtb_registration_id="+params;
            openInNewTab(url);
        }
    }

    function setNormalValue(){

        $(".priceformat").each(function(){
            var thisVal = $(this).val();
            if(thisVal!=0){
                $(this).val(thisVal.replace(/,/g ,''))
            }
        });
    }

</script>

<!-- /Function Pendukung -->

<!-- Action -->

<script>

    $('#njop_pbb').on('change', function() {
        var njop_pbb = $('#njop_pbb').val();
        if(njop_pbb != "") {
            var result = njop_pbb.replace(/[^0-9]/g,'');
            $('#njop_pbb').val(result);
        }
    });

    $('#potongan_waris').on('change', function() {
        // $('#npop_kp').val(0);
        // $('#bphtb_amt').val(0);
        // hitungPembayaran();
        getNPOP();

    });

    $('#bphtb_discount').keyup( function() {
        hitungPembayaran();
    });

    $('.back').on('click', function(event){
        var FLAG            = '<?php echo $_POST['FLAG']; ?>';
        event.stopPropagation();

        if(FLAG == 'Detail' || FLAG == 'Add'){
            loadContentWithParams("transaksi.t_bphtb_registration_list", {});
        }else if(FLAG == 'Edit' ){
            loadContentWithParams("transaksi.t_bphtb_registration_list_update", {});
        }
    });

    $('#printWisnu').on('click', function(event){
        printLaporan(2);
    });

    $('#insert').on('click', function(event){
        validasi();

        setNormalValue();
        save();
        //alert('insert');
    });

    $('#update').on('click', function(event){
        validasi();

        setNormalValue();
        update();


        //update();
        //alert('update');
    });

    $('#delete').on('click', function(event){
        var var_url = "<?php echo WS_JQGRID . "transaksi.t_bphtb_registration_list_controller/delete/?"; ?>";
        var_url += "id="+"<?php echo $_POST['id']; ?>";

        swal({
          title: "Apakah anda Ingin Menghapus Data Ini?",
          text: "",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function(){
            setTimeout(function(){
            $.getJSON(var_url, function( items ) {
                swal("Delete finished!");
                loadContentWithParams("transaksi.t_bphtb_registration_list", {});
            });
        }, 3000);

        });
    });

    function validasi(){
        var wp_name                     = $('#wp_name').val();
        var njop_pbb                    = $('#njop_pbb').val();
        var npwp                        = $('#npwp').val();
        var wp_address_name             = $('#wp_address_name').val();
        var wp_kota                     = $('#wp_p_region_id').val();
        var wp_kecamatan                = $('#wp_p_region_id_kec').val();
        var wp_kelurahan                = $('#wp_p_region_id_kel').val();
        var object_kota                 = $('#object_p_region_id').val();
        var object_kecamatan            = $('#object_p_region_id_kec').val();
        var object_kelurahan            = $('#object_p_region_id_kel').val();
        var p_bphtb_legal_doc_type_id   = $('#p_bphtb_legal_doc_type_id').val();

        if(wp_kota == '' || wp_kota == null || object_kota == '' || object_kota == null){
            swal ( "Oopss" ,  "Kota harus diisi !" ,  "error" );
            return true;
        }

        if(wp_kecamatan == '' || wp_kecamatan == null || object_kecamatan == '' || object_kecamatan == null){
            swal ( "Oopss" ,  "Kecamatan harus diisi !" ,  "error" );
            return true;
        }

        if(wp_kelurahan == '' || wp_kelurahan == null || object_kelurahan == '' || object_kelurahan == null){
            swal ( "Oopss" ,  "Kelurahan harus diisi !" ,  "error" );
            return true;
        }

        if(p_bphtb_legal_doc_type_id == '' || p_bphtb_legal_doc_type_id == null){
            swal ( "Oopss" ,  "Dokumen Pendukung harus diisi !" ,  "error" );
            return true;
        }

        if(wp_name == '' || wp_name == null){
            swal ( "Oopss" ,  "Nama WP harus diisi !" ,  "error" );
            return true;
        }
        

        if(npwp == '' || npwp == null){
            swal ( "Oopss" ,  "NPWP harus diisi !" ,  "error" );
            return true;
        }

        if( wp_address_name == '' || wp_address_name == null){
            swal ( "Oopss" ,  "Alamat harus diisi !" ,  "error" );
            return true;
        }

        if( wp_address_name == '' || wp_address_name == null){
            swal ( "Oopss" ,  "Alamat harus diisi !" ,  "error" );
            return true;
        }

        if( njop_pbb == '' || njop_pbb == null){
            swal ( "Oopss" ,  "No Objek Pajak harus diisi !" ,  "error" );
            return true;
        }
    }

    function save(){
        var wp_name                     = $('#wp_name').val();
        var npwp                        = $('#npwp').val();
        var wp_address_name             = $('#wp_address_name').val();
        var wp_rt                       = $('#wp_rt').val();
        var wp_rw                       = $('#wp_rw').val();
        var wp_p_region_id              = $('#wp_p_region_id').val();
        var wp_p_region_id_kec          = $('#wp_p_region_id_kec').val();
        var wp_p_region_id_kel          = $('#wp_p_region_id_kel').val();
        var phone_no                    = $('#phone_no').val();
        var mobile_phone_no             = $('#mobile_phone_no').val();
        var njop_pbb                    = $('#njop_pbb').val();
        var object_letak_tanah          = $('#object_letak_tanah').val();
        var object_rt                   = $('#object_rt').val();
        var object_rw                   = $('#object_rw').val();
        var object_p_region_id          = $('#object_p_region_id').val();
        var object_p_region_id_kec      = $('#object_p_region_id_kec').val();
        var object_p_region_id_kel      = $('#object_p_region_id_kel').val();
        var p_bphtb_legal_doc_type_id   = $('#p_bphtb_legal_doc_type_id').val();
        var land_area                   = $('#land_area').val();
        var land_price_per_m            = $('#land_price_per_m').val();
        var land_total_price            = $('#land_total_price').val();
        var building_area               = $('#building_area').val();
        var building_price_per_m        = $('#building_price_per_m').val();
        var building_total_price        = $('#building_total_price').val();
        var market_price                = $('#market_price').val();
        var npop                        = $('#npop').val();
        var npop_tkp                    = $('#npop_tkp').val();
        var npop_kp                     = $('#npop_kp').val();
        var bphtb_amt                   = $('#bphtb_amt').val();
        var bphtb_discount              = $('#bphtb_discount').val();
        var bphtb_amt_final             = $('#bphtb_amt_final').val();
        var description                 = $('#description').val();
        var jenis_harga_bphtb           = $('#jenis_harga_bphtb').val();
        var bphtb_legal_doc_description = $('#bphtb_legal_doc_description').val();
        var add_disc_percent            = $('#add_disc_percent').val();
        var check_potongan              = $('#check_potongan').val();
        var land_area_real              = $('#land_area_real').val();
        var land_price_real             = $('#land_price_real').val();
        var building_area_real          = $('#building_area_real').val();
        var building_price_real         = $('#building_price_real').val();

        var ischeck = $('#check_potongan').is(":checked");
        if(ischeck){
            check_potongan = 'Y';
        }else{
            check_potongan = 'N';
        }


        var var_url = "<?php echo WS_JQGRID . "transaksi.t_bphtb_registration_list_controller/insert/?"; ?>";
        var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";

         var_url += "&wp_name=" + wp_name;
         var_url += "&npwp=" + npwp;
         var_url += "&wp_address_name=" + wp_address_name;
         var_url += "&wp_rt=" + wp_rt;
         var_url += "&wp_rw=" + wp_rw;
         var_url += "&wp_p_region_id=" + wp_p_region_id;
         var_url += "&wp_p_region_id_kec=" + wp_p_region_id_kec;
         var_url += "&wp_p_region_id_kel=" + wp_p_region_id_kel;
         var_url += "&phone_no=" + phone_no;
         var_url += "&mobile_phone_no=" + mobile_phone_no;
         var_url += "&njop_pbb=" + njop_pbb;
         var_url += "&object_letak_tanah=" + object_letak_tanah;
         var_url += "&object_rt=" + object_rt;
         var_url += "&object_rw=" + object_rw;
         var_url += "&object_p_region_id=" + object_p_region_id;
         var_url += "&object_p_region_id_kec=" + object_p_region_id_kec
         var_url += "&object_p_region_id_kel=" + object_p_region_id_kel;
         var_url += "&p_bphtb_legal_doc_type_id=" + p_bphtb_legal_doc_type_id;
         var_url += "&land_area=" + land_area;
         var_url += "&land_price_per_m=" + land_price_per_m;
         var_url += "&land_total_price=" + land_total_price;
         var_url += "&building_area=" + building_area;
         var_url += "&building_price_per_m=" + building_price_per_m;
         var_url += "&building_total_price=" + building_total_price;
         var_url += "&market_price=" + market_price;
         var_url += "&npop=" + npop;
         var_url += "&npop_tkp=" + npop_tkp;
         var_url += "&npop_kp=" + npop_kp;
         var_url += "&bphtb_amt=" + bphtb_amt;
         var_url += "&bphtb_discount=" + bphtb_discount;
         var_url += "&bphtb_amt_final=" + bphtb_amt_final;
         var_url += "&description=" + description;
         var_url += "&jenis_harga_bphtb=" + jenis_harga_bphtb;
         var_url += "&bphtb_legal_doc_description=" + bphtb_legal_doc_description;
         var_url += "&add_disc_percent=" + add_disc_percent;
         var_url += "&check_potongan=" + check_potongan;
         var_url += "&land_area_real=" + land_area_real;
         var_url += "&land_price_real=" + land_price_real;
         var_url += "&building_area_real=" + building_area_real;
         var_url += "&building_price_real=" + building_price_real;
         //alert(var_url);



        $.getJSON(var_url, function( items ) {
            if(items.rows.o_mess=="Data Berhasil Disimpan"){
                swal('Informasi',items.rows.o_mess,'info');
                loadContentWithParams("transaksi.t_bphtb_registration_list", {});
            }else{
                swal('Informasi','Tolong Periksa Inputan Anda Kembali','info');
            }
        })
    }

    function update(){
        //alert('masuk');
        var t_bphtb_registration_id     = $('#t_bphtb_registration_id').val();
        var wp_name                     = $('#wp_name').val();
        var npwp                        = $('#npwp').val();
        var wp_address_name             = $('#wp_address_name').val();
        var wp_rt                       = $('#wp_rt').val();
        var wp_rw                       = $('#wp_rw').val();
        var wp_p_region_id              = $('#wp_p_region_id').val();
        var wp_p_region_id_kec          = $('#wp_p_region_id_kec').val();
        var wp_p_region_id_kel          = $('#wp_p_region_id_kel').val();
        var mobile_phone_no             = $('#mobile_phone_no').val();
        var njop_pbb                    = $('#njop_pbb').val();
        var object_address_name         = $('#object_letak_tanah').val();
        var object_rt                   = $('#object_rt').val();
        var object_rw                   = $('#object_rw').val();
        var object_p_region_id          = $('#object_p_region_id').val();
        var object_p_region_id_kec      = $('#object_p_region_id_kec').val();
        var object_p_region_id_kel      = $('#object_p_region_id_kel').val();
        var p_bphtb_legal_doc_type_id   = $('#p_bphtb_legal_doc_type_id').val();
        var land_area                   = $('#land_area').val();
        var land_price_per_m            = $('#land_price_per_m').val();
        var land_total_price            = $('#land_total_price').val();
        var building_area               = $('#building_area').val();
        var building_price_per_m        = $('#building_price_per_m').val();
        var building_total_price        = $('#building_total_price').val();
        var market_price                = $('#market_price').val();
        var npop                        = $('#npop').val();
        var npop_tkp                    = $('#npop_tkp').val();
        var npop_kp                     = $('#npop_kp').val();
        var bphtb_amt                   = $('#bphtb_amt').val();
        var bphtb_discount              = $('#bphtb_discount').val();
        var bphtb_amt_final             = $('#bphtb_amt_final').val();
        var description                 = $('#description').val();
        var jenis_harga_bphtb           = $('#jenis_harga_bphtb').val();
        var bphtb_legal_doc_description = $('#bphtb_legal_doc_description').val();
        var add_disc_percent            = $('#add_disc_percent').val();
        var land_area_real              = $('#land_area_real').val();
        var land_price_real             = $('#land_price_real').val();
        var building_area_real          = $('#building_area_real').val();
        var building_price_real         = $('#building_price_real').val();


        var var_url = "<?php echo WS_JQGRID . "transaksi.t_bphtb_registration_list_controller/update/?"; ?>";
        var_url += "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";

         var_url += "&wp_name=" + wp_name;
         var_url += "&npwp=" + npwp;
         var_url += "&wp_address_name=" + wp_address_name;
         var_url += "&wp_rt=" + wp_rt;
         var_url += "&wp_rw=" + wp_rw;
         var_url += "&wp_p_region_id=" + wp_p_region_id;
         var_url += "&wp_p_region_id_kec=" + wp_p_region_id_kec;
         var_url += "&wp_p_region_id_kel=" + wp_p_region_id_kel;
         var_url += "&mobile_phone_no=" + mobile_phone_no;
         var_url += "&njop_pbb=" + njop_pbb;
         var_url += "&object_address_name=" + object_address_name;
         var_url += "&object_rt=" + object_rt;
         var_url += "&object_rw=" + object_rw;
         var_url += "&object_p_region_id=" + object_p_region_id;
         var_url += "&object_p_region_id_kec=" + object_p_region_id_kec
         var_url += "&object_p_region_id_kel=" + object_p_region_id_kel;
         var_url += "&p_bphtb_legal_doc_type_id=" + p_bphtb_legal_doc_type_id;
         var_url += "&land_area=" + land_area;
         var_url += "&land_price_per_m=" + land_price_per_m;
         var_url += "&land_total_price=" + land_total_price;
         var_url += "&building_area=" + building_area;
         var_url += "&building_price_per_m=" + building_price_per_m;
         var_url += "&building_total_price=" + building_total_price;
         var_url += "&market_price=" + market_price;
         var_url += "&npop=" + npop;
         var_url += "&npop_tkp=" + npop_tkp;
         var_url += "&npop_kp=" + npop_kp;
         var_url += "&bphtb_amt=" + bphtb_amt;
         var_url += "&bphtb_discount=" + bphtb_discount;
         var_url += "&bphtb_amt_final=" + bphtb_amt_final;
         var_url += "&description=" + description;
         var_url += "&jenis_harga_bphtb=" + jenis_harga_bphtb;
         var_url += "&bphtb_legal_doc_description=" + bphtb_legal_doc_description;
         var_url += "&add_disc_percent=" + add_disc_percent;
         var_url += "&land_area_real=" + land_area_real;
         var_url += "&land_price_real=" + land_price_real;
         var_url += "&building_area_real=" + building_area_real;
         var_url += "&building_price_real=" + building_price_real;
         var_url += "&t_bphtb_registration_id=" + t_bphtb_registration_id;


        //alert(var_url);


        $.getJSON(var_url, function( items ) {
            swal('Informasi',items.rows,'info');
            loadContentWithParams("transaksi.t_bphtb_registration_list", {});
        })
    }

</script>

<!-- Action -->