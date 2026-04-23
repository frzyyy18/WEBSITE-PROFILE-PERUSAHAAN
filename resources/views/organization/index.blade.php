@extends('layouts.app')

@section('title', 'Struktur Organisasi - CV. Sriwijaya Serangkai')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
:root {
    --gold:#C9922A; --gold-l:#E8B84B; --gold-pale:#FDF6E3;
    --navy:#0D1F3C; --navy-m:#1A3460; --navy-l:#2A4D8F;
    --teal:#0E7C6B; --teal-l:#22C9AA;
    --orange:#B85C1A; --orange-l:#E87A3A;
    --slate:#4A5568; --line:#D4B896;
    --green:#166534; --green-l:#22C55E;
    --rose:#9B2C2C; --rose-l:#FC8181;
    --purple:#5B21B6; --purple-l:#A78BFA;
    --cyan:#0E6B8C; --cyan-l:#38BDF8;
}
*{box-sizing:border-box;}
body{font-family:'DM Sans',sans-serif;}

.org-page{background:linear-gradient(160deg,#f8f4ee 0%,#eef2f8 60%,#f0ece6 100%);min-height:100vh;}

.org-header{background:var(--navy);color:white;padding:60px 24px 76px;text-align:center;position:relative;overflow:hidden;}
.org-header::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 70% 80% at 20% 50%,rgba(201,146,42,.18) 0%,transparent 60%),radial-gradient(ellipse 60% 70% at 80% 30%,rgba(42,77,143,.35) 0%,transparent 60%);}
.org-header::after{content:'';position:absolute;bottom:-1px;left:0;right:0;height:60px;background:linear-gradient(160deg,#f8f4ee 0%,#eef2f8 100%);clip-path:ellipse(55% 100% at 50% 100%);}
.hdr-badge{position:relative;display:inline-flex;align-items:center;gap:8px;background:rgba(201,146,42,.18);border:1px solid rgba(201,146,42,.5);border-radius:999px;padding:6px 18px;font-size:12px;font-weight:500;letter-spacing:.12em;text-transform:uppercase;color:var(--gold-l);margin-bottom:18px;}
.org-header h1{font-family:'Playfair Display',serif;font-size:clamp(2rem,5vw,3.4rem);font-weight:900;line-height:1.1;position:relative;}
.org-header h1 span{color:var(--gold-l);}
.org-header p{position:relative;margin-top:10px;color:rgba(255,255,255,.58);font-size:14px;letter-spacing:.04em;}
.gold-divider{width:56px;height:3px;background:linear-gradient(90deg,var(--gold),var(--gold-l));border-radius:2px;margin:18px auto 0;}

.chart-wrap{max-width:1100px;margin:-20px auto 0;padding:0 20px 80px;}
.v-line{width:2px;background:linear-gradient(to bottom,var(--gold),var(--line));margin:0 auto;border-radius:1px;}

.node{display:flex;flex-direction:column;align-items:center;text-align:center;}
.node-card{background:white;border-radius:18px;padding:20px 26px 16px;box-shadow:0 4px 24px rgba(13,31,60,.10);position:relative;transition:transform .25s,box-shadow .25s;min-width:160px;}
.node-card:hover{transform:translateY(-4px);box-shadow:0 12px 40px rgba(13,31,60,.15);}
.node-card::before{content:'';position:absolute;top:0;left:20px;right:20px;height:3px;border-radius:0 0 3px 3px;}
.nc-gold::before{background:linear-gradient(90deg,var(--gold),var(--gold-l));}
.nc-navy::before{background:linear-gradient(90deg,var(--navy),var(--navy-l));}
.nc-teal::before{background:linear-gradient(90deg,var(--teal),var(--teal-l));}
.nc-orange::before{background:linear-gradient(90deg,var(--orange),var(--orange-l));}
.node-icon{width:50px;height:50px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-family:'Playfair Display',serif;font-weight:700;font-size:15px;margin:0 auto 10px;}
.ni-gold{background:linear-gradient(135deg,var(--gold),var(--gold-l));color:white;}
.ni-navy{background:linear-gradient(135deg,var(--navy),var(--navy-l));color:white;}
.ni-teal{background:linear-gradient(135deg,var(--teal),var(--teal-l));color:white;}
.ni-orange{background:linear-gradient(135deg,var(--orange),var(--orange-l));color:white;}
.node-title{font-weight:600;font-size:13px;color:var(--navy);}
.node-name{font-size:11.5px;color:var(--slate);margin-top:3px;}

.direksi-row{display:flex;justify-content:center;gap:48px;position:relative;}
.direksi-row::before{content:'';position:absolute;top:0;left:calc(50% - 110px);right:calc(50% - 110px);height:2px;background:linear-gradient(90deg,var(--gold-l),var(--line));}

.branch-connector{display:flex;flex-direction:column;align-items:center;margin-bottom:28px;}
.branch-connector .vs{width:2px;height:26px;background:linear-gradient(to bottom,var(--gold),var(--line));margin:0 auto;}
.branch-connector .hs{width:min(700px,90%);height:2px;background:linear-gradient(90deg,transparent,var(--gold-l),var(--line),var(--gold-l),transparent);border-radius:1px;}
.branch-connector .vs2{width:2px;height:22px;background:var(--line);margin:0 auto;}

.branch-header{text-align:center;margin-bottom:28px;}
.branch-header h2{font-family:'Playfair Display',serif;font-size:1.35rem;color:var(--navy);font-weight:700;}
.branch-header p{font-size:13px;color:var(--slate);margin-top:4px;}

.branch-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(230px,1fr));gap:18px;}

.branch-card{background:white;border-radius:20px;overflow:hidden;box-shadow:0 4px 20px rgba(13,31,60,.08);transition:transform .25s,box-shadow .25s;cursor:pointer;position:relative;}
.branch-card:hover{transform:translateY(-6px);box-shadow:0 20px 48px rgba(13,31,60,.16);}
.branch-card:hover .click-hint{opacity:1;}
.click-hint{position:absolute;bottom:13px;right:15px;opacity:0;transition:opacity .2s;display:flex;align-items:center;gap:4px;font-size:10.5px;font-weight:600;color:var(--gold);letter-spacing:.04em;}
.bc-top{background:linear-gradient(135deg,var(--navy) 0%,var(--navy-m) 100%);padding:20px 20px 14px;display:flex;align-items:center;gap:12px;}
.bc-num{width:42px;height:42px;flex-shrink:0;border-radius:12px;background:linear-gradient(135deg,var(--gold),var(--gold-l));display:flex;align-items:center;justify-content:center;font-family:'Playfair Display',serif;font-weight:700;font-size:13px;color:white;text-align:center;line-height:1.1;padding:4px;}
.bc-info .title{font-weight:600;font-size:12px;color:white;line-height:1.3;}
.bc-info .name{font-size:11px;color:rgba(255,255,255,.5);margin-top:2px;}
.bc-body{padding:14px 18px 18px;}
.bc-row{display:flex;justify-content:space-between;align-items:center;padding:6px 0;border-bottom:1px solid #F0EDE8;font-size:12px;}
.bc-row:last-child{border-bottom:none;padding-bottom:20px;}
.bc-row .lbl{color:var(--slate);}
.bc-row .cnt{font-weight:600;color:var(--navy);background:var(--gold-pale);border:1px solid #E8C98A;border-radius:99px;padding:1px 9px;font-size:10.5px;}

.org-footer-note{text-align:center;font-size:13px;color:var(--slate);background:white;border-radius:16px;padding:18px 24px;margin-top:36px;box-shadow:0 2px 12px rgba(13,31,60,.06);border-left:4px solid var(--gold);}

@keyframes fadeUp{from{opacity:0;transform:translateY(18px);}to{opacity:1;transform:translateY(0);}}
.anim{animation:fadeUp .5s ease both;}
.a1{animation-delay:.05s;}.a2{animation-delay:.13s;}.a3{animation-delay:.22s;}.a4{animation-delay:.32s;}.a5{animation-delay:.42s;}

/* ══ MODAL ══ */
.modal-overlay{position:fixed;inset:0;background:rgba(13,31,60,.7);backdrop-filter:blur(7px);-webkit-backdrop-filter:blur(7px);z-index:9000;display:flex;align-items:flex-start;justify-content:center;padding:20px;overflow-y:auto;opacity:0;pointer-events:none;transition:opacity .3s;}
.modal-overlay.open{opacity:1;pointer-events:all;}
.modal-box{background:#f8f4ee;border-radius:28px;width:100%;max-width:980px;margin:auto;box-shadow:0 32px 80px rgba(13,31,60,.35);transform:translateY(28px) scale(.97);transition:transform .38s cubic-bezier(.34,1.56,.64,1),opacity .3s;opacity:0;}
.modal-overlay.open .modal-box{transform:translateY(0) scale(1);opacity:1;}
.modal-box::-webkit-scrollbar{width:5px;}
.modal-box::-webkit-scrollbar-thumb{background:var(--line);border-radius:3px;}

.modal-head{background:linear-gradient(135deg,var(--navy) 0%,var(--navy-m) 100%);border-radius:28px 28px 0 0;padding:28px 32px 24px;position:relative;overflow:hidden;}
.modal-head::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 60% 120% at 90% 50%,rgba(201,146,42,.15) 0%,transparent 60%);}
.modal-close{position:absolute;top:18px;right:18px;width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.2);color:white;font-size:18px;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:background .2s;z-index:1;line-height:1;}
.modal-close:hover{background:rgba(255,255,255,.25);}
.mh-inner{position:relative;display:flex;align-items:center;gap:18px;}
.mh-num{width:64px;height:64px;flex-shrink:0;border-radius:16px;background:linear-gradient(135deg,var(--gold),var(--gold-l));display:flex;align-items:center;justify-content:center;font-family:'Playfair Display',serif;font-weight:900;font-size:11px;color:white;box-shadow:0 4px 16px rgba(201,146,42,.4);text-align:center;padding:6px;line-height:1.2;}
.mh-sub{font-size:10.5px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--gold-l);margin-bottom:4px;}
.mh-title{font-family:'Playfair Display',serif;font-size:1.4rem;font-weight:900;color:white;line-height:1.2;}
.mh-name{font-size:12.5px;color:rgba(255,255,255,.52);margin-top:3px;}

.modal-body{padding:28px 28px 36px;overflow-x:auto;}
.tree-wrap{min-width:720px;}
.tree-level{display:flex;flex-direction:column;align-items:center;}

.tn{display:inline-flex;flex-direction:column;align-items:center;}
.tn-box{background:white;border-radius:14px;padding:12px 18px 11px;box-shadow:0 2px 14px rgba(13,31,60,.09);position:relative;min-width:150px;text-align:center;transition:transform .2s,box-shadow .2s;}
.tn-box:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(13,31,60,.13);}
.tn-box::before{content:'';position:absolute;top:0;left:12px;right:12px;height:3px;border-radius:0 0 3px 3px;}
.tb-gold::before{background:linear-gradient(90deg,var(--gold),var(--gold-l));}
.tb-navy::before{background:linear-gradient(90deg,var(--navy),var(--navy-l));}
.tb-teal::before{background:linear-gradient(90deg,var(--teal),var(--teal-l));}
.tb-orange::before{background:linear-gradient(90deg,var(--orange),var(--orange-l));}
.tb-green::before{background:linear-gradient(90deg,var(--green),var(--green-l));}
.tb-rose::before{background:linear-gradient(90deg,var(--rose),var(--rose-l));}
.tb-purple::before{background:linear-gradient(90deg,var(--purple),var(--purple-l));}
.tb-cyan::before{background:linear-gradient(90deg,var(--cyan),var(--cyan-l));}

.tn-ico{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;font-family:'Playfair Display',serif;margin:0 auto 8px;}
.ico-gold  {background:linear-gradient(135deg,var(--gold),var(--gold-l));color:white;}
.ico-navy  {background:linear-gradient(135deg,var(--navy),var(--navy-l));color:white;}
.ico-teal  {background:linear-gradient(135deg,var(--teal),var(--teal-l));color:white;}
.ico-orange{background:linear-gradient(135deg,var(--orange),var(--orange-l));color:white;}
.ico-green {background:linear-gradient(135deg,var(--green),var(--green-l));color:white;}
.ico-rose  {background:linear-gradient(135deg,var(--rose),var(--rose-l));color:white;}
.ico-purple{background:linear-gradient(135deg,var(--purple),var(--purple-l));color:white;}
.ico-cyan  {background:linear-gradient(135deg,var(--cyan),var(--cyan-l));color:white;}

.tn-title{font-weight:600;font-size:12px;color:var(--navy);line-height:1.3;}
.tn-name{font-size:10.5px;color:var(--slate);margin-top:2px;}
.tn-count{display:inline-block;margin-top:5px;background:var(--gold-pale);border:1px solid #E8C98A;border-radius:99px;padding:1px 8px;font-size:10px;font-weight:600;color:var(--gold);}

.t-col-vline{width:2px;height:18px;background:var(--line);margin:0 auto;}
.t-sep{display:flex;align-items:center;gap:10px;margin:20px 0 16px;justify-content:center;}
.t-sep span{font-size:10px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--gold);}
.t-sep::before,.t-sep::after{content:'';flex:1;height:1px;background:var(--line);max-width:80px;}

/* leaf node mini card */
.leaf-card{background:white;border-radius:11px;padding:9px 12px;box-shadow:0 2px 10px rgba(13,31,60,.07);text-align:center;min-width:82px;}
.leaf-ico{margin:0 auto 6px;width:28px;height:28px;border-radius:8px;display:flex;align-items:center;justify-content:center;}
.leaf-title{font-size:10.5px;font-weight:600;color:var(--navy);}
.leaf-count{font-size:10px;color:var(--slate);margin-top:1px;}

@media(max-width:640px){
    .branch-grid{grid-template-columns:1fr;}
    .direksi-row{flex-direction:column;align-items:center;gap:16px;}
    .direksi-row::before{display:none;}
    .modal-head{padding:22px 18px 18px;}
    .modal-body{padding:16px 12px 28px;}
}
</style>
@endpush

@section('content')

@php
$cabang = [
    1 => [
        'nama_kepala'       => 'NONE',
        'nama_mgr_admin'    => 'Agus Putry Yana',
        'nama_mgr_pajak'    => 'Anggi Sandra Citrawati',
        'nama_mgr_hrd'      => 'Meiliana Dia',
        'nama_kep_gudang'   => 'Marliani',
        'nama_spv_admin'    => 'Rika Amelia',
        'nama_dss'          => 'Jefri Pranawa & Julianto Imantaka',
        'jml_kasir'         => 1,
        'jml_admin'         => 3,
        'jml_driver'        => 7,
        'jml_helper'        => 5,
        'jml_dss'           => 2,
        'jml_checker'       => 6,
        'jml_admin_gudang'  => 1,
    ],
    2 => [
        'nama_kepala'       => 'Hendi',
        'nama_mgr_admin'    => 'Wulandari',
        'nama_mgr_pajak'    => 'Anggi Sandra Citrawati',
        'nama_mgr_hrd'      => 'Meiliana Dia',
        'nama_kep_gudang'   => 'Alan Meisandi',
        'nama_spv_admin'    => 'none',
        'nama_dss'          => 'Arman',
        'jml_kasir'         => 1,
        'jml_admin'         => 2,
        'jml_driver'        => 5,
        'jml_helper'        => 4,
        'jml_dss'           => 1,
        'jml_checker'       => 4,
        'jml_admin_gudang'  => 2,
    ],
    3 => [
        'nama_kepala'       => 'Sri Berlian',
        'nama_mgr_admin'    => 'Agus Putry Yana',
        'nama_mgr_pajak'    => 'Anggi Sandra Citrawati',
        'nama_mgr_hrd'      => 'Meiliana Dia',
        'nama_kep_gudang'   => 'Masran',
        'nama_spv_admin'    => 'none',
        'nama_dss'          => 'Deri Sandria',
        'jml_kasir'         => 1,
        'jml_admin'         => 2,
        'jml_driver'        => 3,
        'jml_helper'        => 3,
        'jml_dss'           => 1,
        'jml_checker'       => 5,
        'jml_admin_gudang'  => 2,
    ],
    4 => [
        'nama_kepala'       => 'none',
        'nama_mgr_admin'    => 'Vera Vonita',
        'nama_mgr_pajak'    => 'Anggi Sandra Citrawati',
        'nama_mgr_hrd'      => 'Meiliana Dia',
        'nama_kep_gudang'   => 'None',
        'nama_spv_admin'    => 'None',
        'nama_dss'          => 'Aang suryadi & Adewo',
        'jml_kasir'         => 1,
        'jml_admin'         => 2,
        'jml_driver'        => 6,
        'jml_helper'        => 3,
        'jml_dss'           => 2,
        'jml_checker'       => 7,
        'jml_admin_gudang'  => 2,
    ],
    5 => [
        'nama_kepala'       => 'none',
        'nama_mgr_admin'    => 'Agus Putry Yana',
        'nama_mgr_pajak'    => 'Anggi Sandra Citrawati',
        'nama_mgr_hrd'      => 'Meiliana Dia',
        'nama_kep_gudang'   => 'Tomi',
        'nama_spv_admin'    => 'Rika Amelia',
        'nama_dss'          => 'Hendri Prayitna',
        'jml_kasir'         => 1,
        'jml_admin'         => 1,
        'jml_driver'        => 2,
        'jml_helper'        => 1,
        'jml_dss'           => 1,
        'jml_checker'       => 2,
        'jml_admin_gudang'  => 0,
    ],
    6 => [
        'nama_kepala'       => 'none',
        'nama_mgr_admin'    => 'Agus Putry Yana',
        'nama_mgr_pajak'    => 'Anggi Sandra Citrawati',
        'nama_mgr_hrd'      => 'Meiliana Dia',
        'nama_kep_gudang'   => 'M Suryansyah',
        'nama_spv_admin'    => 'Rika Amelia',
        'nama_dss'          => 'Hendri Prayitna',
        'jml_kasir'         => 1,
        'jml_admin'         => 1,
        'jml_driver'        => 1,
        'jml_helper'        => 1,
        'jml_dss'           => 1,
        'jml_checker'       => 2,
        'jml_admin_gudang'  => 0,
    ],
    7 => [
        'nama_kepala'       => 'Redo Dheo Saputra',
        'nama_mgr_admin'    => 'Agus Putry Yana',
        'nama_mgr_pajak'    => 'Anggi Sandra Citrawati',
        'nama_mgr_hrd'      => 'Meiliana Dia',
        'nama_kep_gudang'   => 'none',
        'nama_spv_admin'    => 'none',
        'nama_dss'          => 'none',
        'jml_kasir'         => 1,
        'jml_admin'         => 1,
        'jml_driver'        => 3,
        'jml_helper'        => 2,
        'jml_dss'           => 1,
        'jml_checker'       => 3,
        'jml_admin_gudang'  => 1,
    ],
];

$namaResmi = [
    'SRIWIJAYA SERANGKAI PALEMBANG',
    'SRIWIJAYA SERANGKAI PRABUMULIH',
    'SRIWIJAYA SERANGKAI BANYUASIN',
    'USAHA BARU GT',
    'USAHA BARU HABA',
    'SRIWIJAYA SERANGKAI DISTRIBUSI PALEMBANG',
    'SRIWIJAYA SERANGKAI DISTRIBUSI KAYUAGUNG',
];
// Singkatan untuk kotak ikon kecil di kartu grid
$singkatan = ['PLB','PBM','BYS','UB-GT','UB-HB','SSD-PLB','SSD-KYG'];
@endphp

<div class="org-page">

    {{-- HEADER --}}
    <div class="org-header">
        <div class="hdr-badge">
            <svg width="9" height="9" viewBox="0 0 9 9"><circle cx="4.5" cy="4.5" r="4.5" fill="#E8B84B"/></svg>
            Distributor Resmi Unilever
        </div>
        <h1>Struktur <span>Organisasi</span></h1>
        <p>CV. Sriwijaya Serangkai &nbsp;·&nbsp; 7 Cabang Operasional</p>
        <div class="gold-divider"></div>
    </div>

    <div class="chart-wrap">

        {{-- KOMISARIS --}}
        <div class="node anim a1" style="margin-top:38px;">
            <div class="node-card nc-gold">
                <div class="node-icon ni-gold">KU</div>
                <div class="node-title">Komisaris Utama</div>
                <div class="node-name">Yanto Ho</div>
            </div>
        </div>

        <div class="v-line anim a1" style="height:32px;"></div>

        {{-- DIREKSI --}}
        <div class="anim a2" style="display:flex;flex-direction:column;align-items:center;">
            <div class="direksi-row">
                <div style="position:absolute;top:0;left:calc(50% - 110px);right:calc(50% - 110px);height:2px;background:linear-gradient(90deg,var(--gold-l),var(--line));"></div>
                <div class="node">
                    <div style="width:2px;height:26px;background:linear-gradient(to bottom,var(--gold-l),var(--line));margin:0 auto;"></div>
                    <div class="node-card nc-navy">
                        <div class="node-icon ni-navy">DU</div>
                        <div class="node-title">Direktur Utama</div>
                        <div class="node-name">Gunawan</div>
                    </div>
                </div>
                <div class="node">
                    <div style="width:2px;height:26px;background:linear-gradient(to bottom,var(--gold-l),var(--line));margin:0 auto;"></div>
                    <div class="node-card nc-navy">
                        <div class="node-icon ni-navy">DIR</div>
                        <div class="node-title">Direktur</div>
                        <div class="node-name">Holivia</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="v-line anim a2" style="height:32px;"></div>

        {{-- GENERAL MANAGER --}}
        <div class="node anim a3">
            <div class="node-card nc-teal">
                <div class="node-icon ni-teal">GM</div>
                <div class="node-title">General Manager</div>
                <div class="node-name">Nama General Manager</div>
            </div>
        </div>

        <div class="v-line anim a3" style="height:32px;"></div>

        {{-- BRANCH CONNECTOR --}}
        <div class="branch-connector anim a4">
            <div class="vs"></div>
            <div class="hs"></div>
            <div class="vs2"></div>
        </div>

        {{-- GRID CABANG --}}
        <div class="anim a5">
            <div class="branch-header">
                <h2>Kepala Cabang</h2>
                <p>Klik kartu untuk melihat struktur organisasi tiap cabang secara lengkap</p>
            </div>

            <div class="branch-grid">
                @foreach($cabang as $num => $c)
                <div class="branch-card" onclick="openModal({{ $num }})">
                    <div class="bc-top">
                        <div class="bc-num">{{ $singkatan[$num-1] }}</div>
                        <div class="bc-info">
                            <div class="title">{{ $namaResmi[$num-1] }}</div>
                            @if(!in_array(strtolower($c['nama_kepala']),['none','-','']))
                            <div class="name">{{ $c['nama_kepala'] }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="bc-body">
                        <div class="bc-row"><span class="lbl">Kasir</span><span class="cnt">{{ $c['jml_kasir'] }} org</span></div>
                        <div class="bc-row"><span class="lbl">Admin</span><span class="cnt">{{ $c['jml_admin'] }} org</span></div>
                        <div class="bc-row"><span class="lbl">DSS</span><span class="cnt">{{ $c['jml_dss'] }} org</span></div>
                        <div class="bc-row"><span class="lbl">Checker</span><span class="cnt">{{ $c['jml_checker'] }} org</span></div>
                        <div class="bc-row"><span class="lbl">Admin Gudang</span><span class="cnt">{{ $c['jml_admin_gudang'] }} org</span></div>
                        <div class="bc-row"><span class="lbl">Driver & Helper</span><span class="cnt">{{ $c['jml_driver'] + $c['jml_helper'] }} org</span></div>
                    </div>
                    <div class="click-hint">
                        Lihat Struktur
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="org-footer-note">
                Klik kartu cabang untuk melihat hierarki organisasi lengkap per cabang, termasuk seluruh posisi dan jumlah staf.
            </div>
        </div>

    </div>
</div>

{{-- MODAL --}}
<div class="modal-overlay" id="branchModal" onclick="handleOverlayClick(event)">
    <div class="modal-box" id="modalBox">
        <div class="modal-head">
            <button class="modal-close" onclick="closeModal()">&times;</button>
            <div class="mh-inner">
                <div class="mh-num" id="mh-num"></div>
                <div>
                    <div class="mh-sub">Struktur Organisasi Detail</div>
                    <div class="mh-title" id="mh-title"></div>
                    <div class="mh-name" id="mh-name"></div>
                </div>
            </div>
        </div>
        <div class="modal-body">
            <div class="tree-wrap" id="treeWrap"></div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// ── DATA PHP → JS ─────────────────────────────────────────────────────
const cabangData = {
    @foreach($cabang as $num => $c)
    {{ $num }}: {
        singkatan:        '{{ $singkatan[$num-1] }}',
        namaResmi:        '{{ $namaResmi[$num-1] }}',
        nama_kepala:      '{{ $c['nama_kepala'] }}',
        nama_mgr_admin:   '{{ $c['nama_mgr_admin'] }}',
        nama_mgr_pajak:   '{{ $c['nama_mgr_pajak'] }}',
        nama_mgr_hrd:     '{{ $c['nama_mgr_hrd'] }}',
        nama_kep_gudang:  '{{ $c['nama_kep_gudang'] }}',
        nama_spv_admin:   '{{ $c['nama_spv_admin'] }}',
        nama_dss:         '{{ $c['nama_dss'] }}',
        jml_kasir:        {{ $c['jml_kasir'] }},
        jml_admin:        {{ $c['jml_admin'] }},
        jml_driver:       {{ $c['jml_driver'] }},
        jml_helper:       {{ $c['jml_helper'] }},
        jml_dss:          {{ $c['jml_dss'] }},
        jml_checker:      {{ $c['jml_checker'] }},
        jml_admin_gudang: {{ $c['jml_admin_gudang'] }},
    },
    @endforeach
};

// ── SVG ICONS ─────────────────────────────────────────────────────────
const IC = {
    person: `<svg width="16" height="16" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>`,
    group:  `<svg width="16" height="16" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>`,
    box:    `<svg width="16" height="16" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>`,
    truck:  `<svg width="16" height="16" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13" rx="1"/><path d="M16 8h4l3 5v3h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>`,
    tax:    `<svg width="16" height="16" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="9" y1="13" x2="15" y2="13"/></svg>`,
    hrd:    `<svg width="16" height="16" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>`,
    cash:   `<svg width="16" height="16" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>`,
    star:   `<svg width="16" height="16" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>`,
    check:  `<svg width="16" height="16" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>`,
    folder: `<svg width="16" height="16" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>`,
    hand:   `<svg width="16" height="16" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>`,
};

// ── HELPERS ───────────────────────────────────────────────────────────
const vl = (h=18) => `<div style="width:2px;height:${h}px;background:var(--line);margin:0 auto;"></div>`;

function isNone(s){ return !s || ['none','-',''].includes(s.toLowerCase()); }

function topNode(title, name, ico, icoC, tbC, badge=''){
    const nameHtml = isNone(name) ? '' : `<div class="tn-name">${name}</div>`;
    const badgeHtml = badge ? `<div class="tn-count">${badge}</div>` : '';
    return `<div class="tree-level"><div class="tn"><div class="tn-box ${tbC}">
        <div class="tn-ico ${icoC}">${ico}</div>
        <div class="tn-title">${title}</div>${nameHtml}${badgeHtml}
    </div></div></div>`;
}

function hrow(cols){
    const items = cols.map(c=>`
        <div class="t-col" style="flex:1;max-width:195px;padding:0 5px;">
            <div class="t-col-vline"></div>
            <div class="tn-box ${c.tb}" style="width:100%;">
                <div class="tn-ico ${c.ico}" style="margin:0 auto 8px;">${c.icon}</div>
                <div class="tn-title">${c.title}</div>
                ${isNone(c.name)?'':` <div class="tn-name">${c.name}</div>`}
                ${c.badge?`<div class="tn-count">${c.badge}</div>`:''}
            </div>
        </div>`).join('');
    return `<div style="width:100%;display:flex;flex-direction:column;align-items:center;">${vl(20)}
        <div style="position:relative;display:flex;justify-content:center;width:100%;max-width:${Math.min(cols.length*195,820)}px;">
            <div style="position:absolute;top:0;left:12%;right:12%;height:2px;background:var(--line);"></div>
            ${items}
        </div></div>`;
}

// Leaf mini card
function leaf(ico, icoC, title, count){
    return `<div style="display:flex;flex-direction:column;align-items:center;">
        ${vl(14)}
        <div class="leaf-card">
            <div class="leaf-ico ${icoC}">${ico}</div>
            <div class="leaf-title">${title}</div>
            <div class="leaf-count">${count} orang</div>
        </div></div>`;
}

function sep(label){
    return `<div class="t-sep"><span>${label}</span></div>`;
}

// ── BUILD TREE ────────────────────────────────────────────────────────
function buildTree(d){

    let html = '';

    // Level 1 — Operational Manager / Kepala Cabang
    const kepalaLabel = isNone(d.nama_kepala) ? '(Kosong)' : d.nama_kepala;
    html += topNode('Operational Manager', kepalaLabel, IC.person, 'ico-navy', 'tb-navy', 'Pimpinan Cabang');
    html += vl(20);

    // Level 2 — 4 Manager setara
    html += sep('Level Manager');
    html += hrow([
        {title:'Manajer Admin',  name:d.nama_mgr_admin,   icon:IC.person, ico:'ico-teal',   tb:'tb-teal'},
        {title:'Manajer Pajak',  name:d.nama_mgr_pajak,   icon:IC.tax,    ico:'ico-purple', tb:'tb-purple'},
        {title:'Manajer HRD',    name:d.nama_mgr_hrd,     icon:IC.hrd,    ico:'ico-cyan',   tb:'tb-cyan'},
        {title:'Kepala Gudang',  name:d.nama_kep_gudang,  icon:IC.box,    ico:'ico-orange', tb:'tb-orange'},
    ]);

    // Level 3 — SPV Admin | DSS | bawah Kepala Gudang
    html += sep('Level Supervisor & Operasional');

    html += `<div style="width:100%;display:flex;flex-direction:column;align-items:center;">
    <div style="width:100%;max-width:780px;display:flex;justify-content:center;gap:20px;flex-wrap:wrap;align-items:flex-start;">

        <!-- ① SPV Admin + bawahan (Kasir & Admin) -->
        <div style="display:flex;flex-direction:column;align-items:center;min-width:175px;">
            ${vl(16)}
            <div class="tn-box tb-green" style="min-width:160px;text-align:center;">
                <div class="tn-ico ico-green" style="margin:0 auto 8px;">${IC.group}</div>
                <div class="tn-title">SPV Admin</div>
                ${isNone(d.nama_spv_admin)?'<div class="tn-name" style="color:#aaa;">(Kosong)</div>':`<div class="tn-name">${d.nama_spv_admin}</div>`}
            </div>
            ${vl(14)}
            <div style="display:flex;gap:8px;flex-wrap:wrap;justify-content:center;">
                ${leaf(IC.cash,  'ico-gold',   'Kasir', d.jml_kasir)}
                ${leaf(IC.person,'ico-teal',   'Admin', d.jml_admin)}
            </div>
        </div>

        <!-- ② DSS (setara SPV Admin) -->
        <div style="display:flex;flex-direction:column;align-items:center;min-width:155px;">
            ${vl(16)}
            <div class="tn-box tb-rose" style="min-width:145px;text-align:center;">
                <div class="tn-ico ico-rose" style="margin:0 auto 8px;">${IC.star}</div>
                <div class="tn-title">DSS</div>
                ${isNone(d.nama_dss)?'<div class="tn-name" style="color:#aaa;">(Kosong)</div>':`<div class="tn-name">${d.nama_dss}</div>`}
                <div class="tn-count">${d.jml_dss} orang</div>
            </div>
        </div>

        <!-- ③ Bawahan Kepala Gudang: Checker, Admin Gudang, Driver, Helper -->
        <div style="display:flex;flex-direction:column;align-items:center;min-width:220px;">
            ${vl(16)}
            <div style="font-size:9.5px;font-weight:600;letter-spacing:.08em;text-transform:uppercase;color:var(--orange);margin-bottom:8px;">Bawahan Kepala Gudang</div>
            <div style="display:flex;gap:8px;flex-wrap:wrap;justify-content:center;">
                ${leaf(IC.check,  'ico-green',  'Checker',      d.jml_checker)}
                ${leaf(IC.folder, 'ico-cyan',   'Admin Gudang', d.jml_admin_gudang)}
                ${leaf(IC.truck,  'ico-purple',  'Driver',       d.jml_driver)}
                ${leaf(IC.hand,   'ico-orange',  'Helper',       d.jml_helper)}
            </div>
        </div>

    </div></div>`;

    // Ringkasan
    const total = d.jml_kasir + d.jml_admin + d.jml_dss + d.jml_checker + d.jml_admin_gudang + d.jml_driver + d.jml_helper;
    const stats = [
        {l:'Kasir',       v:d.jml_kasir},
        {l:'Admin',       v:d.jml_admin},
        {l:'DSS',         v:d.jml_dss},
        {l:'Checker',     v:d.jml_checker},
        {l:'Admin Gudang',v:d.jml_admin_gudang},
        {l:'Driver',      v:d.jml_driver},
        {l:'Helper',      v:d.jml_helper},
        {l:'Total',       v:total},
    ];
    html += `<div style="margin-top:28px;background:white;border-radius:16px;padding:16px 20px;box-shadow:0 2px 12px rgba(13,31,60,.06);border-left:4px solid var(--gold);">
        <div style="font-size:10px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--gold);margin-bottom:10px;">Ringkasan Total Staf</div>
        <div style="display:flex;flex-wrap:wrap;gap:7px;">
            ${stats.map(s=>`<div style="flex:1;min-width:72px;background:#f8f4ee;border-radius:10px;padding:9px 10px;text-align:center;">
                <div style="font-size:18px;font-weight:700;font-family:'Playfair Display',serif;color:${s.l==='Total'?'var(--gold)':'var(--navy)'};">${s.v}</div>
                <div style="font-size:9.5px;color:var(--slate);">${s.l}</div>
            </div>`).join('')}
        </div>
    </div>`;

    return html;
}

// ── MODAL CONTROLS ────────────────────────────────────────────────────
function openModal(num){
    const d = cabangData[num];
    document.getElementById('mh-num').textContent   = d.singkatan;
    document.getElementById('mh-title').textContent = d.namaResmi;
    document.getElementById('mh-name').textContent  = isNone(d.nama_kepala) ? 'Operational Manager: (Kosong)' : 'Op. Manager: ' + d.nama_kepala;
    document.getElementById('treeWrap').innerHTML   = buildTree(d);

    const overlay = document.getElementById('branchModal');
    overlay.classList.add('open');
    document.body.style.overflow = 'hidden';
    overlay.scrollTop = 0;
}

function isNone(s){ return !s || ['none','-',''].includes(s.toLowerCase()); }

function closeModal(){
    document.getElementById('branchModal').classList.remove('open');
    document.body.style.overflow = '';
}

function handleOverlayClick(e){
    if(e.target === document.getElementById('branchModal')) closeModal();
}

document.addEventListener('keydown', e => { if(e.key==='Escape') closeModal(); });
</script>
@endpush