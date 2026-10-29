<?php
require_once __DIR__ . '/app_common.php';
if(realpath((string)($_SERVER['SCRIPT_FILENAME']??''))===realpath(__FILE__)){appRequestGuard('public',1024,120,16);if(!in_array($_SERVER['REQUEST_METHOD']??'GET',['GET','HEAD'],true))appReject(405);}
$page_title = "TINHLAGI.PRO - Kho Ứng Dụng ATV";
$page_sub = "Tổng hợp phần mềm cho Tivi/Box/Mobile";

// Nội dung banner có thể thay đổi trong admin.php.
$siteSettingsFile = __DIR__ . '/site_settings.json';
if (is_file($siteSettingsFile)) {
    $siteSettingsRaw = @file_get_contents($siteSettingsFile);
    $siteSettings = $siteSettingsRaw !== false ? json_decode($siteSettingsRaw, true) : null;
    if (is_array($siteSettings)) {
        $savedTitle = trim((string) ($siteSettings['page_title'] ?? ''));
        $savedSub = trim((string) ($siteSettings['page_sub'] ?? ''));
        if ($savedTitle !== '') $page_title = $savedTitle;
        if ($savedSub !== '') $page_sub = $savedSub;
    }
}

// Đã thêm trường 'link' riêng biệt cho từng ứng dụng
$r2 = 'https://pub-fb13fe1daa2c4cf0acf3075c535924da.r2.dev/app/';

$categories = [
    [
        'icon' => '📺',
        'title' => 'TRUYỀN HÌNH - ⚽ ĐÁ BANH',
        'apps' => [
		            ['abbr' => 'GE', 'color' => 'gold', 'name' => 'GetOut_moinhat', 'ver' => 'mới nhất', 'tag' => 'Miễn phí', 'sub' => 'GetOut – bản mới nhất', 'code' => '393939', 'link' => $r2.'Get_Out_2.end.apk'],
            ['abbr' => 'GE', 'color' => 'gold', 'name' => 'GetOut', 'ver' => 'v2.0', 'tag' => 'Miễn phí', 'sub' => 'Ứng dụng xem bóng đá miễn phí', 'code' => '3074016', 'link' => $r2.'Get_Out_2.0.apk'],
            ['abbr' => 'GE', 'color' => 'gold', 'name' => 'GetOut_1.0.9', 'ver' => 'v1.0.9', 'tag' => 'Miễn phí', 'sub' => 'GetOut phiên bản 1.0.9', 'code' => '393939', 'link' => $r2.'Get_Out_1.0.9.apk'],
            ['abbr' => 'SP', 'color' => 'green', 'name' => 'SportsTV_5.2.3.apk', 'ver' => 'v5.2.3', 'tag' => 'Miễn phí', 'sub' => 'SportsTV – xem thể thao IPTV', 'code' => '8705526', 'link' => $r2.'SportsTV_5.2.3.apk'],
            ['abbr' => 'SP', 'color' => 'green', 'name' => 'SportsTV-v4.5-Android5.apk', 'ver' => 'v4.5', 'tag' => 'Miễn phí', 'sub' => 'SportsTV – bản v4.5 cho Android 5', 'code' => '393939', 'link' => $r2.'SportsTV-v4.5-Android5.apk'],
                        ['abbr' => 'SP', 'color' => 'green', 'name' => 'SportzX_1.8v', 'ver' => 'v1.8', 'tag' => 'Miễn phí', 'sub' => 'SportzX – bản v1.8', 'code' => '393939', 'link' => $r2.'SportzX_1.8v.apk'],
            ['abbr' => 'SP', 'color' => 'green', 'name' => 'SportzX_2.1v', 'ver' => 'v2.1', 'tag' => 'Miễn phí', 'sub' => 'SportzX – xem thể thao trực tiếp', 'code' => '6084669', 'link' => $r2.'SportzX_2.1v.apk'],

            ['abbr' => 'SP', 'color' => 'green', 'name' => 'SportzX_2.5', 'ver' => 'v2.5', 'tag' => 'Miễn phí', 'sub' => 'SportzX – bản v2.5', 'code' => '6084669', 'link' => $r2.'SportzX_2.5.apk'],
            ['abbr' => 'SP', 'color' => 'green', 'name' => 'SportzX_2.6v', 'ver' => 'v2.6', 'tag' => 'Miễn phí', 'sub' => 'SportzX – bản v2.6', 'code' => '393939', 'link' => $r2.'SportzX_2.6v.apk'],
            ['abbr' => 'CO', 'color' => 'teal', 'name' => 'CoTiViV1.1.7', 'ver' => 'v1.1.7', 'tag' => 'Miễn phí', 'sub' => 'Ứng dụng xem truyền hình cáp', 'code' => '1344654', 'link' => $r2.'Co_Tivi_1.1.7.apk'],
                        ['abbr' => 'CO', 'color' => 'teal', 'name' => 'CoTV_mobile_1.1.7', 'ver' => 'v1.1.7', 'tag' => 'Miễn phí', 'sub' => 'CoTV Mobile – xem truyền hình cáp', 'code' => '3689268', 'link' => $r2.'CoTV_mobile_1.1.7.apk'],
            ['abbr' => 'DL', 'color' => 'orange', 'name' => 'DLTV', 'ver' => 'v1.8.5', 'tag' => 'Miễn phí', 'sub' => 'Tải & xem nội dung mọi kênh', 'code' => '393939', 'link' => $r2.'DLTV.apk'],
            ['abbr' => 'CR', 'color' => 'rose', 'name' => 'CricHDaiTV_v5.12', 'ver' => 'v5.12', 'tag' => 'Miễn phí', 'sub' => 'CricHDaiTV – xem thể thao & cricket trực tiếp', 'code' => '393939', 'link' => $r2.'CricHDaiTV-v5.12.apk'],
                        ['abbr' => 'TV', 'color' => 'indigo', 'name' => 'TV365_v7', 'ver' => 'v7.0', 'tag' => 'Miễn phí', 'sub' => 'TV365 – bản mới nhất v7', 'code' => '393939', 'link' => $r2.'TV365_v7.apk'],
            ['abbr' => 'TV', 'color' => 'green', 'name' => 'TV365 Mobile v6', 'ver' => 'v6.0', 'tag' => 'Miễn phí', 'sub' => 'Truyền hình 365 ngày – Pach 2', 'code' => '393939', 'link' => $r2.'XemTV365Mobile-V6.apk'],
            ['abbr' => 'TV', 'color' => 'rose', 'name' => 'TV365_V5', 'ver' => 'v5.0', 'tag' => 'Miễn phí', 'sub' => 'TV365 phiên bản mới cực xịn V5', 'code' => '7767106', 'link' => $r2.'TV365_V5.apk'],
            ['abbr' => 'TV', 'color' => 'orange', 'name' => 'TV365_v3', 'ver' => 'v3.0', 'tag' => 'Miễn phí', 'sub' => 'TV365 phiên bản v3', 'code' => '6041579', 'link' => $r2.'TV365_v3.apk'],
            ['abbr' => 'TV', 'color' => 'teal', 'name' => 'TV365_v2_nhenhat', 'ver' => 'v2.0', 'tag' => 'Miễn phí', 'sub' => 'TV365 phiên bản v2 – nhẹ nhất', 'code' => '5955254', 'link' => $r2.'xemtv365-v2.apk'],
            ['abbr' => 'VU', 'color' => 'indigo', 'name' => 'VuaMoiThay', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'Vua Mới Thay – truyền hình', 'code' => '6496764', 'link' => $r2.'VuaMoiThay.apk'],
            ['abbr' => 'IM', 'color' => 'indigo', 'name' => 'iMedia_TV_25.04.06.B', 'ver' => 'v25.04.06', 'tag' => 'Miễn phí', 'sub' => 'Xem phim & truyền hình chất lượng cao', 'code' => '6247724', 'link' => $r2.'iMedia_TV_25.04.06.B_(CÒN_XÀI_ĐƯỢC).apk'],
            ['abbr' => 'VA', 'color' => 'teal', 'name' => 'vAppTV', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'vAppTV – ứng dụng xem truyền hình', 'code' => '9788306', 'link' => $r2.'vAppTV.apk'],
            ['abbr' => 'VG', 'color' => 'rose', 'name' => 'VTVgoTV_v11.12.30', 'ver' => 'v11.12.30', 'tag' => 'Miễn phí', 'sub' => 'VTVgo TV – xem VTV trên Tivi/Box', 'code' => '393939', 'link' => $r2.'VTVgoTV_v11.12.30.apk'],
            ['abbr' => 'VP', 'color' => 'orange', 'name' => 'VTVprime_v1.7.0', 'ver' => 'v1.7.0', 'tag' => 'Miễn phí', 'sub' => 'VTV Prime – nội dung độc quyền VTV', 'code' => '393939', 'link' => $r2.'VTVprime_v1.7.0.apk'],
            ['abbr' => 'VI', 'color' => 'green', 'name' => 'VietPlay_TV_2.3_(bản_cũ)', 'ver' => 'v2.3', 'tag' => 'Miễn phí', 'sub' => 'VietPlay TV v2.3 bản cũ – còn xài được', 'code' => '2523157', 'link' => $r2.'VietPlay_TV_2.3_(bản_cũ)_(CÒN_XÀI_ĐƯỢC).apk'],
            ['abbr' => 'CR', 'color' => 'rose', 'name' => 'Cricfy_V6.6', 'ver' => 'v6.6', 'tag' => 'Miễn phí', 'sub' => 'Cricfy – xem thể thao trực tiếp', 'code' => '1213128', 'link' => $r2.'Cricfy_V6.6.apk'],
            ['abbr' => 'GS', 'color' => 'gold', 'name' => 'GeeSports_V3.6', 'ver' => 'v3.6', 'tag' => 'Miễn phí', 'sub' => 'GeeSports – xem bóng đá trực tiếp', 'code' => '7266756', 'link' => $r2.'GeeSports_(V3.6).apk'],
            ['abbr' => 'CX', 'color' => 'orange', 'name' => 'Hóng TV', 'ver' => 'v1.1.8', 'tag' => 'Miễn phí', 'sub' => 'HóngTV – xem bóng đá miễn phí', 'code' => '7027363', 'link' => $r2.'hongtv.apk'],



        ],
    ],
    [
        'icon' => '🎥',
        'title' => 'PHIM 4K',
        'apps' => [
            ['abbr' => '4K', 'color' => 'gold', 'name' => 'Phim4K_v2.5.8_tivi', 'ver' => 'v2.5.8', 'tag' => 'Miễn phí', 'sub' => 'Phim 4K phiên bản Tivi/Box (.apk)', 'code' => '4833418', 'link' => $r2.'Phim4K_v.2.5.8_tivi.apk'],
            ['abbr' => '4K', 'color' => 'gold', 'name' => 'Phim4K_v2.5.9', 'ver' => 'v2.5.9', 'tag' => 'Miễn phí', 'sub' => 'Phim 4K phiên bản 2.5.9', 'code' => '393939', 'link' => $r2.'Phim4K_v2.5.9.apk'],
            ['abbr' => '4K', 'color' => 'gold', 'name' => 'Phim4K_2.6.0', 'ver' => 'v2.6.0', 'tag' => 'Miễn phí', 'sub' => 'Phim 4K phiên bản mới nhất 2.6.0', 'code' => '4411335', 'link' => $r2.'Phim4K_2.6.0.apk'],
            ['abbr' => '4K', 'color' => 'teal', 'name' => 'Phim4K_v2.3.1_smartphone', 'ver' => 'v2.3.1', 'tag' => 'Miễn phí', 'sub' => 'Phim 4K phiên bản smartphone', 'code' => '393939', 'link' => $r2.'Phim4K_v2.3.1_smartphone.apk'],
            ['abbr' => '4K', 'color' => 'indigo', 'name' => 'Phim4K_Windows_Portable', 'ver' => 'v2.4.0', 'tag' => 'Miễn phí', 'sub' => 'Phim 4K – Windows Portable (.zip)', 'code' => '393939', 'link' => $r2.'Phim4K_Windows_Portable.zip'],
            ['abbr' => '4K', 'color' => 'orange', 'name' => 'Phim4K_v2.4.0.exe', 'ver' => 'v2.4.0', 'tag' => 'Miễn phí', 'sub' => 'Phim 4K phiên bản Windows (.exe)', 'code' => '393939', 'link' => $r2.'Phim4K_v2.4.0.exe'],
            ['abbr' => '4K', 'color' => 'rose', 'name' => 'Phim4K_v2.4.0_Iphone', 'ver' => 'v2.4.0', 'tag' => 'Miễn phí', 'sub' => 'Phim 4K phiên bản iPhone (.ipa)', 'code' => '393939', 'link' => $r2.'Phim4K_v2.4.0_Iphone.ipa'],
            ['abbr' => '4K', 'color' => 'teal', 'name' => 'Phim4K_v2.4.0_May_tinh_bang', 'ver' => 'v2.4.0', 'tag' => 'Miễn phí', 'sub' => 'Phim 4K phiên bản máy tính bảng', 'code' => '393939', 'link' => $r2.'Phim4K_v2.4.0_May_tinh_bang.apk'],
            ['abbr' => '4K', 'color' => 'green', 'name' => 'Phim4K_v2.4.0_Mobile', 'ver' => 'v2.4.0', 'tag' => 'Miễn phí', 'sub' => 'Phim 4K phiên bản Mobile (.apk)', 'code' => '393939', 'link' => $r2.'Phim4K_v2.4.0_Mobile.apk'],
            ['abbr' => '4K', 'color' => 'indigo', 'name' => 'Phim4K_v2.4.0_macOS', 'ver' => 'v2.4.0', 'tag' => 'Miễn phí', 'sub' => 'Phim 4K phiên bản macOS (.dmg)', 'code' => '393939', 'link' => $r2.'Phim4K_v2.4.0_macOS.dmg'],

        ],
    ],

    [
        'icon' => '🎬',
        'title' => 'XEM PHIM',
        'apps' => [
                        ['abbr' => 'GU', 'color' => 'gold', 'name' => 'Gu-Phim_v1.0_Windows', 'ver' => 'v1.0', 'tag' => 'Miễn phí', 'sub' => 'Gu Phim – phiên bản Windows (.zip)', 'code' => '393939', 'link' => $r2.'Gu-Phim-v1.0-Windows.zip'],
            ['abbr' => 'GU', 'color' => 'orange', 'name' => 'Gu-Phim_v1.0_Mobile_Tablet_TV', 'ver' => 'v1.0', 'tag' => 'Miễn phí', 'sub' => 'Gu Phim – bản Mobile/Tablet/TV (.apk)', 'code' => '393939', 'link' => $r2.'Gu-Phim-v1.0-Mobile-Tablet-TV.apk'],
		            ['abbr' => 'NV', 'color' => 'rose', 'name' => 'Hiphim mobile', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'Ứng dụng xem phim Hiphim', 'code' => '393939', 'link' => $r2.'hiphimapp.apk'],
					['abbr' => 'NV', 'color' => 'rose', 'name' => 'Hiphim Tivi', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'Ứng dụng xem phim Hiphim', 'code' => '393939', 'link' => $r2.'hiphimtv.apk'],
            ['abbr' => 'NV', 'color' => 'rose', 'name' => 'NVCPhim_v2.2.8', 'ver' => 'v2.2.8', 'tag' => 'Miễn phí', 'sub' => 'Ứng dụng xem phim NVC', 'code' => '2653652', 'link' => $r2.'NVCPhim_v2.2.8.apk'],
            ['abbr' => 'NV', 'color' => 'teal', 'name' => 'NVC_Movie', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'NVC Movie – phim online', 'code' => '393939', 'link' => $r2.'NVC_Movie.apk'],
            ['abbr' => 'HI', 'color' => 'teal', 'name' => 'hieuga', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'Ứng dụng xem phim hieuga', 'code' => '1059695', 'link' => $r2.'hieuga.apk'],
            ['abbr' => 'VU', 'color' => 'indigo', 'name' => 'vuagiaitri', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'Vua Giải Trí – giải trí tổng hợp', 'code' => '7716517', 'link' => $r2.'vuagiaitri.apk'],
            ['abbr' => 'CB', 'color' => 'rose', 'name' => 'cobephim-tv', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'Cobe Phim – xem phim trên TV', 'code' => '6207062', 'link' => $r2.'cobephimtv.apk'],
			['abbr' => 'CB', 'color' => 'rose', 'name' => 'cobephim mobile', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'Cobe Phim – xem phim trên Mobile', 'code' => '6207062', 'link' => $r2.'cobephimtvphone_v1.5.apk'],
            ['abbr' => 'RP', 'color' => 'orange', 'name' => 'rapphim-0.2.1-mobile', 'ver' => 'v0.2.1', 'tag' => 'Miễn phí', 'sub' => 'Rap Phim phiên bản mobile', 'code' => '393939', 'link' => $r2.'rapphim-0-2-1-mobile.apk'],
            ['abbr' => 'RP', 'color' => 'green', 'name' => 'rapphim-1.0.1-tv', 'ver' => 'v1.0.1', 'tag' => 'Miễn phí', 'sub' => 'Rap Phim phiên bản TV/Box', 'code' => '6766306', 'link' => $r2.'rapphim-1-0-1-tv.apk'],
            ['abbr' => 'SG', 'color' => 'teal', 'name' => 'saigonphim-tv', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'Sài Gòn Phim – xem phim trên TV', 'code' => '7048453', 'link' => $r2.'saigonphim-tv.apk'],
            ['abbr' => 'CH', 'color' => 'gold', 'name' => 'Chợ_Phim', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'Chợ Phim – xem phim đa dạng', 'code' => '5774068', 'link' => $r2.'ChoPhim_Android_TV.apk'],
            ['abbr' => 'CL', 'color' => 'indigo', 'name' => 'CloudStream_4.7.0', 'ver' => 'v4.7.0', 'tag' => 'Miễn phí', 'sub' => 'CloudStream – xem phim online', 'code' => '393939', 'link' => $r2.'CloudStream_[4.7.0].apk'],
            ['abbr' => 'KO', 'color' => 'teal', 'name' => 'KODI_22.0', 'ver' => 'v22.0', 'tag' => 'Miễn phí', 'sub' => 'KODI – trung tâm giải trí đa phương tiện', 'code' => '393939', 'link' => $r2.'KODI_22.0.apk'],
            ['abbr' => 'NE', 'color' => 'rose', 'name' => 'NETFLY_v3', 'ver' => 'v3.0', 'tag' => 'Miễn phí', 'sub' => 'NETFLY – xem phim và thể thao', 'code' => '2844821', 'link' => $r2.'NETFLY_v3.apk'],
            ['abbr' => 'NV', 'color' => 'orange', 'name' => 'NVC_Movie_TV_v2.6.10', 'ver' => 'v2.6.10', 'tag' => 'Miễn phí', 'sub' => 'NVC Movie TV – xem phim trên TV', 'code' => '1659529', 'link' => $r2.'NVC_Movie_TV_v2.6.10.apk'],
            ['abbr' => 'TG', 'color' => 'green', 'name' => 'TiemGiaiTri_v1.0', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'Tiệm Giải Trí – bản mới (apk)', 'code' => '393939', 'link' => $r2.'TiemGiaiTri.apk'],

            ['abbr' => 'VA', 'color' => 'rose', 'name' => 'VAX_Player_1.6.5', 'ver' => 'v1.6.5', 'tag' => 'Miễn phí', 'sub' => 'VAX Player – trình phát phim đa năng', 'code' => '1387135', 'link' => $r2.'VAX_Player_1.6.5_(6666).apk'],

            ['abbr' => 'VA', 'color' => 'indigo', 'name' => 'VaxPlayer_1.7.6', 'ver' => 'v1.7.6', 'tag' => 'Miễn phí', 'sub' => 'VaxPlayer – bản 1.7.6 (Android)', 'code' => '393939', 'link' => $r2.'VaxPlayer1.7.6.apk'],
            ['abbr' => 'VA', 'color' => 'gold', 'name' => 'VaxPlayer_1.7.6_iOS', 'ver' => 'v1.7.6', 'tag' => 'Miễn phí', 'sub' => 'VaxPlayer – bản 1.7.6 dành cho iOS (.ipa)', 'code' => '393939', 'link' => $r2.'VaxPlayer1.7.6.ipa'],
            ['abbr' => 'DP', 'color' => 'orange', 'name' => 'DaoPhim_TV_1.0.3', 'ver' => 'v1.0.3', 'tag' => 'Miễn phí', 'sub' => 'Đảo Phim – bản dành cho TV', 'code' => '393939', 'link' => $r2.'daophim-1.0.3-tv.apk'],
            ['abbr' => 'DP', 'color' => 'teal', 'name' => 'DaoPhim_Mobile', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'Đảo Phim – bản dành cho Mobile', 'code' => '393939', 'link' => $r2.'daophim-mobile.apk'],
        ],
    ],

    [
        'icon' => '📡',
        'title' => 'PHẦN MỀM IPTV',
        'apps' => [

            ['abbr' => 'IP', 'color' => 'teal', 'name' => 'IPTV_PRO', 'ver' => 'v1.0.0', 'tag' => 'PRO', 'sub' => 'IPTV Pro – xem truyền hình', 'code' => '393939', 'link' => $r2.'IPTV_PRO.apk'],
            ['abbr' => 'MM', 'color' => 'indigo', 'name' => 'M3u-IPTV-v3.0.11-Mod', 'ver' => 'v3.0.11', 'tag' => 'MOD', 'sub' => 'M3U IPTV player đã mod', 'code' => '393939', 'link' => $r2.'M3u-IPTV-v3.0.11-Mod.apk'],
            ['abbr' => 'OT', 'color' => 'orange', 'name' => 'OTT_Navigator_v1.7.4.1_Mod', 'ver' => 'v1.7.4.1', 'tag' => 'MOD', 'sub' => 'OTT Navigator IPTV đã mod', 'code' => '1995826', 'link' => $r2.'OTT_Navigator_v1.7.4.1_Mod.apk'],
            ['abbr' => 'SP', 'color' => 'rose', 'name' => 'SparkleTV', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'SparkleTV – IPTV player', 'code' => '8439261', 'link' => $r2.'SparkleTV.apk'],
            ['abbr' => 'TI', 'color' => 'teal', 'name' => 'TiviMate_v5.1.6_MOD', 'ver' => 'v5.1.6', 'tag' => 'MOD', 'sub' => 'TiviMate IPTV Player đã mod premium', 'code' => '393939', 'link' => $r2.'TiviMate_v5.1.6_MOD.apk'],
            ['abbr' => 'QU', 'color' => 'indigo', 'name' => 'quantv', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'QuanTV – IPTV player', 'code' => '393939', 'link' => $r2.'quantv.apk'],
            ['abbr' => 'TE', 'color' => 'gold', 'name' => 'televizo_v1.9.6.50_premium', 'ver' => 'v1.9.6.50', 'tag' => 'Premium', 'sub' => 'Televizo IPTV phiên bản premium', 'code' => '6508980', 'link' => $r2.'televizo_v1.9.6.50_premium.apk'],
            ['abbr' => 'TI', 'color' => 'rose', 'name' => 'tivimate_2.1.5_premium', 'ver' => 'v2.1.5', 'tag' => 'Premium', 'sub' => 'TiviMate 2.1.5 phiên bản premium', 'code' => '393939', 'link' => $r2.'tivimate_2.1.5_premium.apk'],
            ['abbr' => 'BA', 'color' => 'gold', 'name' => 'Backup_Host_5.1.6', 'ver' => 'v5.1.6', 'tag' => 'Miễn phí', 'sub' => 'Backup Host cho IPTV', 'code' => '4739677', 'link' => $r2.'Backup_Host_5.1.6.tmb'],
            ['abbr' => 'TI', 'color' => 'indigo', 'name' => 'TiviMate_5.3.0', 'ver' => 'v5.3.0', 'tag' => 'Miễn phí', 'sub' => 'TiviMate IPTV Player bản 5.3.0', 'code' => '393939', 'link' => $r2.'TiviMate-5.3.0.apk'],
            ['abbr' => 'TE', 'color' => 'orange', 'name' => 'Televizo_byphaptx52022', 'ver' => 'v5.2022', 'tag' => 'Miễn phí', 'sub' => 'Televizo bản chỉnh sửa by phaptx', 'code' => '393939', 'link' => $r2.'Televizo_byphaptx52022.apk.zip'],
            ['abbr' => 'DL', 'color' => 'teal', 'name' => 'DL_Tivi', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'DL Tivi – ứng dụng xem truyền hình', 'code' => '2426878', 'link' => $r2.'DL_Tivi.apk'],
            ['abbr' => 'ON', 'color' => 'indigo', 'name' => 'OnlyTV', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'OnlyTV – ứng dụng xem truyền hình', 'code' => '393939', 'link' => $r2.'OnlyTV.apk'],
            ['abbr' => 'PC', 'color' => 'green', 'name' => 'PCRTV_4.1.0', 'ver' => 'v4.1.0', 'tag' => 'Miễn phí', 'sub' => 'PCRTV – xem truyền hình', 'code' => '4579948', 'link' => $r2.'PCRTV_[4.1.0].apk.zip'],
            ['abbr' => 'QT', 'color' => 'rose', 'name' => 'QTV3.9_Vip', 'ver' => 'v3.9', 'tag' => 'VIP', 'sub' => 'QTV3.9 Vip - pass123@123', 'code' => '5508842', 'link' => $r2.'QTV3.9_Vip_pass123@123.apk'],
            ['abbr' => 'VG', 'color' => 'rose', 'name' => 'VTVgoTV_v12.6.29', 'ver' => 'v12.6.29', 'tag' => 'Miễn phí', 'sub' => 'VTVgo TV – xem VTV trên Tivi/Box', 'code' => '8462034', 'link' => $r2.'VTVgoTV_v12.6.29.apk'],
     
            ['abbr' => 'TE', 'color' => 'teal', 'name' => 'Televizo_v1.9.6.50_Premium', 'ver' => 'v1.9.6.50', 'tag' => 'Premium', 'sub' => 'Televizo IPTV bản Premium', 'code' => '393939', 'link' => $r2.'Televizo_v1.9.6.50_Premium.apk'],
            ['abbr' => 'TE', 'color' => 'orange', 'name' => 'Televizo_byphaptx52022_zip', 'ver' => 'v5.2022', 'tag' => 'Miễn phí', 'sub' => 'Televizo bản chỉnh sửa by phaptx (zip)', 'code' => '393939', 'link' => $r2.'Televizo_byphaptx52022.apk.zip'],
            ['abbr' => 'TI', 'color' => 'indigo', 'name' => 'TiviMate_5.1.6_BannerMod_Spydog', 'ver' => 'v5.1.6', 'tag' => 'MOD', 'sub' => 'TiviMate 5.1.6 Banner Mod bởi Spydog', 'code' => '393939', 'link' => $r2.'TiviMate_5.1.6___BannerM0d_Spydog.apk.zip'],
            ['abbr' => 'TI', 'color' => 'green', 'name' => 'TiviMate_5.1.6_v2', 'ver' => 'v5.1.6', 'tag' => 'Miễn phí', 'sub' => 'TiviMate 5.1.6 bản v2 (zip)', 'code' => '393939', 'link' => $r2.'TiviMate_5.1.6_(v2).apk.zip'],
        ],
    ],
    [
        'icon' => '▶️',
        'title' => 'YOUTUBE TV',
        'apps' => [
            ['abbr' => 'TO', 'color' => 'rose', 'name' => 'ToTube', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'ToTube – xem YouTube trên TV', 'code' => '393939', 'link' => $r2.'ToTube.apk'],
            ['abbr' => 'YO', 'color' => 'orange', 'name' => 'Youtube_1.0.8', 'ver' => 'v1.0.8', 'tag' => 'Miễn phí', 'sub' => 'YouTube phiên bản TV', 'code' => '8788599', 'link' => $r2.'Youtube_1.0.8.apk'],
                        ['abbr' => 'YV', 'color' => 'rose', 'name' => 'vanced_youtube_v20', 'ver' => 'v20', 'tag' => 'MOD', 'sub' => 'YouTube ReVanced – bản MOD chặn quảng cáo', 'code' => '393939', 'link' => $r2.'vanced_youtube_v20.apk'],
            ['abbr' => 'YM', 'color' => 'indigo', 'name' => 'vanced_youtube_music', 'ver' => 'v8.40.54', 'tag' => 'MOD', 'sub' => 'YouTube Music ReVanced – bản MOD', 'code' => '393939', 'link' => $r2.'vanced.to_vanced_youtube_music.apk'],
                        ['abbr' => 'MG', 'color' => 'teal', 'name' => 'microg_v0.3.13', 'ver' => 'v0.3.13', 'tag' => 'Miễn phí', 'sub' => 'MicroG – bản quyền hỗ trợ ReVanced', 'code' => '393939', 'link' => $r2.'microg_v0.3.13.apk'],

            ['abbr' => 'MA', 'color' => 'teal', 'name' => 'mapvoice', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'MapVoice – YouTube có giọng đọc', 'code' => '7701927', 'link' => $r2.'mapvoice.apk'],
            ['abbr' => 'SA', 'color' => 'indigo', 'name' => 'supervoice-mod-ATV14', 'ver' => 'v14.0', 'tag' => 'MOD', 'sub' => 'SuperVoice Mod dành cho ATV14', 'code' => '393939', 'link' => $r2.'supervoice-mod-ATV14.apk'],
            ['abbr' => 'SU', 'color' => 'green', 'name' => 'supervoice_ATV9+', 'ver' => 'v9.0+', 'tag' => 'MOD', 'sub' => 'SuperVoice dành cho ATV9 trở lên', 'code' => '393939', 'link' => $r2.'supervoice_ATV9+.apk'],
            ['abbr' => 'S2', 'color' => 'gold', 'name' => 'supperVoice-2.2', 'ver' => 'v2.2', 'tag' => 'MOD', 'sub' => 'SupperVoice 2.2 – YouTube có giọng đọc', 'code' => '393939', 'link' => $r2.'supperVoice-2.2.apk'],

        ],
    ],
    [
        'icon' => '🛠️',
        'title' => 'TOOL (CÔNG CỤ)',
        'apps' => [
            ['abbr' => 'CC', 'color' => 'teal', 'name' => 'Coc_Coc_Lite_1.6', 'ver' => 'v1.6', 'tag' => 'Miễn phí', 'sub' => 'Cốc Cốc Lite – trình duyệt TV', 'code' => '393939', 'link' => $r2.'Coc_Coc_Lite_1.6.apk'],
            ['abbr' => 'AU', 'color' => 'orange', 'name' => 'Autostart+v4.1.1_Modded_', 'ver' => 'v4.1.1', 'tag' => 'MOD', 'sub' => 'Autostart – khởi động app tự động', 'code' => '393939', 'link' => $r2.'Autostart%2Bv4.1.1_Modded_.apk'],
            ['abbr' => '_A', 'color' => 'teal', 'name' => '_ATV_app__TV_AppsDrawer', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'TV Apps Drawer – quản lý ứng dụng ATV', 'code' => '393939', 'link' => $r2.'_ATV_app__TV_AppsDrawer.apk'],
            ['abbr' => 'AM', 'color' => 'green', 'name' => 'atvTools_v1.3.0_42-mod', 'ver' => 'v1.3.0', 'tag' => 'MOD', 'sub' => 'ATV Tools – công cụ tiện ích cho box', 'code' => '393939', 'link' => $r2.'atvTools_v1.3.0_42-mod.apk'],
            ['abbr' => 'TV', 'color' => 'rose', 'name' => 'tvQuickActions_Pro_v3.6.0__Patched', 'ver' => 'v3.6.0', 'tag' => 'Patched', 'sub' => 'TV Quick Actions Pro – thao tác nhanh', 'code' => '393939', 'link' => $r2.'tvQuickActions_Pro_v3.6.0__Patched_.apk'],
            ['abbr' => 'TQ', 'color' => 'orange', 'name' => 'TvQuickAction_3.0.8', 'ver' => 'v3.0.8', 'tag' => 'Miễn phí', 'sub' => 'TV Quick Action – bản 3.0.8', 'code' => '393939', 'link' => $r2.'TvQuickAction_3.0.8.apk'],
            ['abbr' => 'TQ', 'color' => 'green', 'name' => 'TvQuickActions_Pro_v3.7.0', 'ver' => 'v3.7.0 (405)', 'tag' => 'Miễn phí', 'sub' => 'TV Quick Actions Pro – bản mới nhất 405', 'code' => '393939', 'link' => $r2.'tvQuickActions_Pro_v3.7.0_(405).apk'],
            ['abbr' => 'RE', 'color' => 'indigo', 'name' => 'Remote_for_Android_TV_v6.0.3', 'ver' => 'v6.0.3', 'tag' => 'No Ads', 'sub' => 'Remote điều khiển Android TV không quảng cáo', 'code' => '393939', 'link' => $r2.'Remote_for_Android_TV_v6.0.3_(no_ads).apk'],
            ['abbr' => 'DT', 'color' => 'teal', 'name' => 'Developer_Tools_2.1.1', 'ver' => 'v2.1.1', 'tag' => 'Miễn phí', 'sub' => 'Developer Tools – công cụ cho lập trình viên', 'code' => '393939', 'link' => $r2.'Developer_Tools_2.1.1.apk.jar'],
            ['abbr' => 'BR', 'color' => 'green', 'name' => 'Buttons_remapper_v1.2', 'ver' => 'v1.2', 'tag' => 'Miễn phí', 'sub' => 'Buttons Remapper – gán lại phím remote', 'code' => '393939', 'link' => $r2.'Buttons_remapper_v1.2.apk'],
            ['abbr' => 'BM', 'color' => 'rose', 'name' => 'Button_Mapper_v3.2', 'ver' => 'v3.2', 'tag' => 'Miễn phí', 'sub' => 'Button Mapper – tùy chỉnh nút bấm remote', 'code' => '393939', 'link' => $r2.'Button_Mapper_v3.2.apk.zip'],
            ['abbr' => 'AD', 'color' => 'gold', 'name' => 'Add_Tivi_Remote', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'Add Tivi Remote – thêm điều khiển tivi', 'code' => '393939', 'link' => $r2.'Add_Tivi_Remote.apk'],
        ],
    ],
    [
        'icon' => '🖥️',
        'title' => 'GIAO DIỆN TIVI',
        'apps' => [
            ['abbr' => 'PL', 'color' => 'gold', 'name' => 'Pro_Launcher_(PhapViet)', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'Pro Launcher PhápViệt – launcher TV/Box', 'code' => '8513629', 'link' => $r2.'Pro_Launcher_(PhapViet).apk'],
            ['abbr' => 'PJ', 'color' => 'orange', 'name' => 'Project_Launcher', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'Project Launcher – launcher cho Android TV', 'code' => '393939', 'link' => $r2.'Project_Launcher.apk'],
            ['abbr' => 'PT', 'color' => 'indigo', 'name' => 'ProTVLauncher_V5', 'ver' => 'v5.0', 'tag' => 'Miễn phí', 'sub' => 'ProTV Launcher – launcher tối ưu cho box', 'code' => '6410730', 'link' => $r2.'ProTVLauncher_V5.apk'],
            ['abbr' => 'LM', 'color' => 'teal', 'name' => 'Launcher-Manager_1.0.4', 'ver' => 'v1.0.4', 'tag' => 'Miễn phí', 'sub' => 'Launcher Manager – quản lý launcher', 'code' => '393939', 'link' => $r2.'Launcher-Manager-1.0.4.apk'],
            ['abbr' => 'HT', 'color' => 'green', 'name' => 'HomeTV_Launcher_6.3.1', 'ver' => 'v6.3.1', 'tag' => 'Miễn phí', 'sub' => 'HomeTV Launcher – giao diện home box', 'code' => '393939', 'link' => $r2.'HomeTV_Launcher_6.3.1.apk'],
            ['abbr' => 'GT', 'color' => 'rose', 'name' => 'Google_TV_Home_1.0.4', 'ver' => 'v1.0.4', 'tag' => 'Miễn phí', 'sub' => 'Google TV Home – giao diện Google TV', 'code' => '393939', 'link' => $r2.'Google_TV_Home_1.0.4.apk'],
        ],
    ],
    [
        'icon' => '🏪',
        'title' => 'STORE (CỬA HÀNG TẢI APP)',
        'apps' => [
            ['abbr' => 'AT', 'color' => 'gold', 'name' => 'Aptoide_TV_5.1.2', 'ver' => 'v5.1.2', 'tag' => 'Miễn phí', 'sub' => 'Aptoide TV – kho ứng dụng cho TV/Box', 'code' => '393939', 'link' => $r2.'Aptoide_TV_5.1.2.apk'],
            ['abbr' => 'DL', 'color' => 'rose', 'name' => 'DLStore_v16.0.4', 'ver' => 'v16.0.4', 'tag' => 'Miễn phí', 'sub' => 'DLStore – kho ứng dụng cho tivi/box Xiaomi', 'code' => '5103033', 'link' => $r2.'DLStore_v16.0.4.apk'],
            ['abbr' => 'HD', 'color' => 'indigo', 'name' => 'HDPlay_Store', 'ver' => 'v3.1.9', 'tag' => 'Miễn phí', 'sub' => 'HDPlay Store – kho app cho TV/Box', 'code' => '393939', 'link' => $r2.'HDPlay_Store_[3.1.9].apk'],
            ['abbr' => 'HD', 'color' => 'indigo', 'name' => 'Movie Legend Store', 'ver' => 'v3.1.5', 'tag' => 'Miễn phí', 'sub' => 'Movie Legend Store', 'code' => '4369204', 'link' => $r2.'Movie Legend Store.apk'],
            ['abbr' => 'TT', 'color' => 'teal', 'name' => 'TTV_Store_3.0', 'ver' => 'v3.0', 'tag' => 'Miễn phí', 'sub' => 'TTV Store – kho ứng dụng cho box', 'code' => '393939', 'link' => $r2.'TTV_Store_3.0.apk'],
            ['abbr' => 'BE', 'color' => 'orange', 'name' => 'beecubestore2', 'ver' => 'v2.0', 'tag' => 'Miễn phí', 'sub' => 'Beecube Store – kho ứng dụng cho box', 'code' => '393939', 'link' => $r2.'beecubestore2.apk'],
            ['abbr' => 'MC', 'color' => 'green', 'name' => 'Kho_Ung_Dung_MCU', 'ver' => 'v1.0', 'tag' => 'Miễn phí', 'sub' => 'Kho Ứng Dụng MCU', 'code' => '5212814', 'link' => $r2.'box_store_mcu_v1.apk'],
            ['abbr' => 'EM', 'color' => 'indigo', 'name' => 'EMOTN_Store', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'EMOTN Store – kho ứng dụng', 'code' => '393939', 'link' => $r2.'emotnstore.apk'],
            ['abbr' => 'FD', 'color' => 'rose', 'name' => 'FERRARI_DOWNLOADER', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'Ferrari Downloader (pháp việt) – công cụ tải file', 'code' => '5356270', 'link' => $r2.'ferraridownloader.apk'],
            ['abbr' => 'MS', 'color' => 'teal', 'name' => 'MStore_v2.0', 'ver' => 'v2.0', 'tag' => 'Miễn phí', 'sub' => 'MStore – kho ứng dụng cho box', 'code' => '393939', 'link' => $r2.'mstore.apk'],
            ['abbr' => 'DA', 'color' => 'green', 'name' => 'ĐôngAnhStore_25.3.2', 'ver' => 'v25.3.2', 'tag' => 'Miễn phí', 'sub' => 'Đông Anh Store – kho ứng dụng', 'code' => '393939', 'link' => $r2.'ĐôngAnhStore_25.3.2.apk'],
            ['abbr' => 'BS', 'color' => 'rose', 'name' => 'BoxStoreMCU_v2.0', 'ver' => 'v2.0', 'tag' => 'Miễn phí', 'sub' => 'BoxStore MCU – kho ứng dụng cho box', 'code' => '393939', 'link' => $r2.'BoxStoreMCU_v2.0.apk'],
        ],
    ],
    [
        'icon' => '📥',
        'title' => 'APP NHẬP CODE & QUẢN LÝ TẬP TIN',
        'apps' => [
            ['abbr' => 'DO', 'color' => 'gold', 'name' => 'Downloader_AFTV_v1.4.5', 'ver' => 'v1.4.5', 'tag' => 'Miễn phí', 'sub' => 'Downloader AFTV – nhập code tải app', 'code' => '393939', 'link' => $r2.'Downloader_AFTV_v1.4.5.apk'],
            ['abbr' => 'DO', 'color' => 'orange', 'name' => 'Downloader_AFTV_v1.5.3', 'ver' => 'v1.5.3', 'tag' => 'Miễn phí', 'sub' => 'Downloader AFTV – bản v1.5.3 (zip)', 'code' => '393939', 'link' => $r2.'Downloader_AFTV_v1.5.3.apk.zip'],
            ['abbr' => 'FI', 'color' => 'teal', 'name' => 'File_Manager_3.8.2', 'ver' => 'v3.8.2', 'tag' => 'Miễn phí', 'sub' => 'File Manager – quản lý tập tin trên TV/Box', 'code' => '393939', 'link' => $r2.'File_Manager_3.8.2.apk'],
            ['abbr' => 'XP', 'color' => 'indigo', 'name' => 'Xplorer_File_Manager_Premium', 'ver' => 'Premium', 'tag' => 'Premium', 'sub' => 'Xplorer File Manager – bản Premium (zip)', 'code' => '393939', 'link' => $r2.'Xplorer_File_Manager_Premium.apk.zip'],
            ['abbr' => 'FE', 'color' => 'rose', 'name' => 'FERRARI_DOWNLOADER_zip', 'ver' => 'v1.0.0', 'tag' => 'Miễn phí', 'sub' => 'Ferrari Downloader (pháp việt) – bản zip', 'code' => '393939', 'link' => $r2.'ferraridownloader.apk.zip'],
        ],
    ],
];

// Dữ liệu do admin.php quản lý. Nếu file thiếu/hỏng, dùng danh sách hard-code
// phía trên để website vẫn hoạt động bình thường.
$downloadCountsFile = __DIR__ . '/download_counts.json';
$analyticsFile = __DIR__ . '/analytics.json';
$defaultDownloadCount = APP_DEFAULT_DOWNLOADS;
$isDirectAppRequest = isset($_SERVER['SCRIPT_FILENAME'])
    && realpath((string) $_SERVER['SCRIPT_FILENAME']) === realpath(__FILE__);
try {
    $categories = appLoadCatalog($categories, $isDirectAppRequest);
    if ($isDirectAppRequest) appReleaseCatalogLock();
} catch (Throwable $e) {
    appLog($e->getMessage());
    http_response_code(503);
    exit('Dữ liệu ứng dụng tạm thời không khả dụng. Vui lòng thử lại sau.');
}

require_once __DIR__ . '/safe_stats.php';

if ($isDirectAppRequest && isset($_GET['download'])) {
    $requestedId = is_string($_GET['download']) ? strtolower(trim($_GET['download'])) : '';
    $downloadApp = null;
    if (preg_match('/^[a-f0-9]{64}$/', $requestedId)) {
        foreach ($categories as $category) {
            foreach ($category['apps'] as $app) {
                if (appDownloadId($app) === $requestedId || in_array($requestedId, $app['legacy_download_ids'] ?? [], true)) {
                    $downloadApp = $app;
                    break 2;
                }
            }
        }
    }
    header('Cache-Control: no-store');
    if ($downloadApp === null) {
        http_response_code(404);
        exit('Ứng dụng không tồn tại.');
    }
    // HEAD checks must not increase counters; old shared links resolve to the first matching app.
    if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'HEAD') {
        $id = appDownloadId($downloadApp);
        appRecordSafeEvent('download', $id);
    }
    header('Cache-Control: private, no-store');
    header('Location: ' . $downloadApp['link'], true, 302);
    exit;
}

try { $downloadCounts = appReadJson($downloadCountsFile); }
catch (Throwable $e) { appLog($e->getMessage()); $downloadCounts = []; }
if ($isDirectAppRequest && ($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'HEAD') appRecordSafeEvent('visit');

$announcement = ['enabled' => false, 'title' => 'Thông báo', 'content' => '', 'updated_at' => ''];
$announcementFile = __DIR__ . '/announcement.json';
if (is_file($announcementFile)) {
    $announcementRaw = @file_get_contents($announcementFile);
    $announcementData = $announcementRaw !== false ? json_decode($announcementRaw, true) : null;
    if (is_array($announcementData)) {
        $announcement['enabled'] = !empty($announcementData['enabled']);
        $announcement['title'] = trim((string) ($announcementData['title'] ?? 'Thông báo'));
        $announcement['content'] = trim((string) ($announcementData['content'] ?? ''));
        $announcement['updated_at'] = trim((string) ($announcementData['updated_at'] ?? ''));
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <meta name="theme-color" content="#1a73e8">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="TINHLAGI">
    <link rel="manifest" href="/app/manifest.json?v=9">

    <link rel="apple-touch-icon" href="/app/icon-192x192.png">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

:root {
            --bg: #f0f2f7;
            --bg-card: #ffffff;
            --bg-item: #f7f8fc;
            --border: #e4e7ef;
            --blue: #1a73e8;
            --blue-light: #e8f0fe;
            --purple: #7c3aed;
            --gold: #f59e0b;
            --text-primary: #1a1d2e;
            --text-secondary: #6b7280;
            --font: 'Be Vietnam Pro', 'Segoe UI', sans-serif;
            --radius-card: 18px;
            --radius-item: 12px;
            --shadow-card: 0 2px 16px rgba(0,0,0,0.07), 0 1px 4px rgba(0,0,0,0.04);
        }

        html {
            scroll-behavior: smooth;
        }
        body {
            background: var(--bg);
            font-family: var(--font);
            color: var(--text-primary);
            min-height: 100vh;
        }

        /* ── HERO ── */
        .hero {
            background: linear-gradient(135deg, #1a1d2e 0%, #1e3a8a 60%, #1a73e8 100%);
            padding: 36px 24px 28px;
            text-align: center;
            color: #fff;
        }
        .hero-title {
            font-size: clamp(22px, 5vw, 30px);
            font-weight: 900;
            letter-spacing: -0.3px;
            margin-bottom: 6px;
        }
        .hero-sub {
            font-size: 13px;
            opacity: 0.72;
            font-weight: 500;
        }

        /* ── TIPS BOX ── */
        .tips-box {
            margin: 18px 14px 0;
            background: var(--blue);
            border-radius: var(--radius-card);
            overflow: hidden;
        }
        .tips-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 13px 16px;
            cursor: pointer;
            color: #fff;
        }
        .tips-header-left {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 800;
            font-size: 12.5px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        .tips-body {
            background: #fff;
        }
        .tips-body a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            font-size: 13px;
            color: var(--text-primary);
            font-weight: 500;
            border-bottom: 1px solid var(--border);
            text-decoration: none;
            transition: background 0.15s;
        }
        .tips-body a:last-child {
            border-bottom: none;
        }
        .tips-body a:hover {
            background: var(--bg-item);
        }
        .tips-body a::before {
            content: '➜';
            color: var(--blue);
            font-size: 12px;
            flex-shrink: 0;
        }

        /* ── CODE ROW ── */
        .code-row {
            display: flex;
            gap: 10px;
            margin: 12px 14px 0;
        }
        .code-row a {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 10px;
            background: var(--bg-card);
            border-radius: var(--radius-card);
            font-size: 12.5px;
            font-weight: 700;
            color: var(--blue);
            text-decoration: none;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-card);
            transition: background 0.15s;
        }
        .code-row a:hover {
            background: var(--blue-light);
        }

        /* ── SEARCH ── */
        .search-wrap {
            padding: 12px 14px 0;
        }
        .search-box {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 10px 16px;
            box-shadow: var(--shadow-card);
            transition: border-color 0.2s;
        }
        .search-box:focus-within {
            border-color: rgba(26,115,232,0.5);
            box-shadow: 0 0 0 3px rgba(26,115,232,0.10);
        }
        .search-icon {
            font-size: 15px;
            opacity: 0.45;
        }
        .search-box input {
            background: none;
            border: none;
            outline: none;
            font-family: var(--font);
            font-size: 14px;
            color: var(--text-primary);
            width: 100%;
        }
        .search-box input::placeholder {
            color: var(--text-secondary);
        }

        /* ── CONTENT ── */
        .content {
            padding: 14px 14px 90px;
        }

        /* ── 2×2 GRID: always 2 columns ── */
        .cats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        /* On small phones, single column */
        @media (max-width: 500px) {
            .cats-grid {
                grid-template-columns: 1fr;
            }
        }

        /* PC wider layout */
        @media (min-width: 900px) {
            .hero {
                padding: 50px 40px 38px;
            }
            .tips-box, .code-row, .search-wrap {
                max-width: 860px;
                margin-left: auto;
                margin-right: auto;
            }
            .content {
                max-width: 1100px;
                margin: 0 auto;
                padding: 16px 24px 60px;
            }
            .cats-grid {
                gap: 20px;
            }
        }

        /* ── CATEGORY CARD ── */
        .cat-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-card);
            overflow: hidden;
            box-shadow: var(--shadow-card);
        }

        .cat-header {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 14px 14px 11px;
            border-bottom: 1px solid rgba(26,115,232,0.2);
            background: linear-gradient(135deg, #1a73e8 0%, #1e3a8a 100%);
        }
        .cat-title {
            color: #fff !important;
        }
        .cat-emoji {
            filter: drop-shadow(0 1px 2px rgba(0,0,0,0.3));
        }
        .cat-emoji {
            font-size: 18px;
            flex-shrink: 0;
        }
        .cat-title {
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.7px;
            text-transform: uppercase;
            color: var(--text-primary);
            flex: 1;
            line-height: 1.3;
        }
        .cat-count {
            font-size: 10.5px;
            font-weight: 700;
            color: #1a73e8;
            background: rgba(255,255,255,0.9);
            border-radius: 20px;
            padding: 2px 9px;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .cat-items {
            padding: 9px 9px 9px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        /* ── APP ITEM ── */
        .app-item {
            display: flex;
            align-items: center;
            gap: 9px;
            background: var(--bg-item);
            border: 1px solid var(--border);
            border-radius: var(--radius-item);
            padding: 9px 10px;
            transition: box-shadow 0.18s, border-color 0.18s;
        }
        .app-item:hover {
            border-color: rgba(26,115,232,0.35);
            box-shadow: 0 3px 12px rgba(26,115,232,0.10);
        }

        .app-avatar {
            width: 36px;
            height: 36px;
            min-width: 36px;
            border-radius: 9px;
            background: linear-gradient(135deg, var(--blue), var(--purple));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            font-weight: 800;
            color: #fff;
            letter-spacing: 0.2px;
            flex-shrink: 0;
        }
        .app-avatar.gold {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }
        .app-avatar.teal {
            background: linear-gradient(135deg, #0d9488, #0891b2);
        }
        .app-avatar.rose {
            background: linear-gradient(135deg, #e11d48, #be123c);
        }
        .app-avatar.indigo {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
        }
        .app-avatar.green {
            background: linear-gradient(135deg, #16a34a, #15803d);
        }
        .app-avatar.orange {
            background: linear-gradient(135deg, #ea580c, #c2410c);
        }

        .app-info {
            flex: 1;
            min-width: 0;
        }
        .app-name {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .app-meta {
            font-size: 12px;
            line-height: 1.35;
            color: #526174;
            margin-top: 3px;
            font-weight: 700;
        }

        .app-actions {
            display: flex;
            gap: 5px;
            align-items: center;
            flex-shrink: 0;
        }

        .btn-code {
            background: #374151;
            color: #fff;
            border: none;
            border-radius: 18px;
            padding: 6px 12px;
            font-size: 11px;
            font-weight: 700;
            font-family: var(--font);
            cursor: pointer;
            transition: background 0.18s;
            white-space: nowrap;
        }
        .btn-code:hover {
            background: #1f2937;
        }
        .code-badge {
            display: none;
            background: #f3f4f6;
            color: #1a1d2e;
            border: 1.5px solid #d1d5db;
            border-radius: 18px;
            padding: 5px 13px;
            font-size: 12px;
            font-weight: 700;
            font-family: var(--font);
            cursor: pointer;
            white-space: nowrap;
            letter-spacing: 0.3px;
            transition: background 0.15s;
        }
        .code-badge:hover {
            background: #e5e7eb;
        }
        .code-badge.visible {
            display: inline-flex;
            align-items: center;
        }

        .btn-icon {
            width: 30px;
            height: 30px;
            background: var(--blue-light);
            border: 1.5px solid rgba(26,115,232,0.25);
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 14px;
            color: var(--blue);
            text-decoration: none;
            transition: background 0.18s;
            flex-shrink: 0;
        }
        .btn-icon:hover {
            background: #c7d9fb;
        }

        .btn-dl {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 6px 11px;
            font-size: 11px;
            font-weight: 700;
            font-family: var(--font);
            cursor: pointer;
            text-decoration: none;
            flex-shrink: 0;
            transition: opacity 0.18s;
            white-space: nowrap;
            box-shadow: 0 2px 6px rgba(21,128,61,0.25);
        }
        .btn-dl:hover {
            opacity: 0.85;
        }
        .btn-dl svg {
            width: 13px;
            height: 13px;
            flex-shrink: 0;
        }

        /* ── COPY MODAL ── */
        .copy-modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.45);
            z-index: 200;
            align-items: center;
            justify-content: center;
        }
        .copy-modal.open {
            display: flex;
        }
        .copy-box {
            background: #fff;
            border-radius: 16px;
            padding: 24px 20px 18px;
            width: min(92vw,420px);
            box-shadow: 0 8px 32px rgba(0,0,0,0.18);
        }
        .copy-title {
            font-size: 14px;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 7px;
        }
        .copy-input {
            width: 100%;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: 9px 12px;
            font-size: 12px;
            font-family: var(--font);
            color: var(--text-primary);
            outline: none;
            background: var(--bg-item);
        }
        .copy-input:focus {
            border-color: rgba(26,115,232,0.5);
        }
        .copy-actions {
            display: flex;
            gap: 8px;
            margin-top: 14px;
            justify-content: flex-end;
        }
        .copy-btn-close {
            background: var(--bg-item);
            border: 1.5px solid var(--border);
            color: var(--text-secondary);
            border-radius: 10px;
            padding: 8px 18px;
            font-size: 12px;
            font-weight: 700;
            font-family: var(--font);
            cursor: pointer;
        }
        .copy-btn-copy {
            background: var(--blue);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 8px 18px;
            font-size: 12px;
            font-weight: 700;
            font-family: var(--font);
            cursor: pointer;
            transition: background 0.15s;
        }
        .copy-btn-copy:hover {
            background: #1558c0;
        }

        /* ── BOTTOM NAV ── */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(255,255,255,0.97);
            backdrop-filter: blur(12px);
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 8px 0 14px;
            z-index: 100;
        }
        @media (min-width: 900px) {
            .bottom-nav {
                display: none;
            }
        }
        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3px;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.4px;
            color: var(--text-secondary);
            cursor: pointer;
            padding: 4px 10px;
            border-radius: 12px;
            transition: color 0.2s;
        }
        .nav-item.active {
            color: var(--blue);
        }
        .nav-icon {
            font-size: 19px;
        }

        /* ── ONLINE BADGE ── */
        .online-badge {
            position: fixed;
            top: 38px;
            right: 3px;
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: #fff;
            border-radius: 20px;
            padding: 5px 8px 5px 6px;
            display: flex;
            align-items: center;
            gap: 4px;
            font-family: var(--font);
            font-size: 11px;
            font-weight: 700;
            box-shadow: 0 4px 16px rgba(21,128,61,0.35);
            z-index: 99;
            cursor: default;
            user-select: none;
            opacity: 0;
            transform: scale(0.8) translateY(-8px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .online-badge.show {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
        .online-dot {
            width: 8px;
            height: 8px;
            background: #86efac;
            border-radius: 50%;
            flex-shrink: 0;
            animation: pulse-dot 1.8s ease-in-out infinite;
        }
        @keyframes pulse-dot {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.5;
                transform: scale(0.7);
            }
        }
        @media (min-width: 900px) {
            .online-badge {
                top: 58px;
                right: 24px;
            }
        }

        /* ── BACK TO TOP ── */
        .back-to-top {
            position: fixed;
            bottom: 72px;
            right: 16px;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1a73e8 0%, #1e3a8a 100%);
            color: #fff;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            cursor: pointer;
            box-shadow: 0 4px 16px rgba(26,115,232,0.4);
            z-index: 98;
            opacity: 0;
            pointer-events: none;
            transform: scale(0.8) translateY(8px);
            transition: opacity 0.25s ease, transform 0.25s ease, background 0.15s;
        }
        .back-to-top.show {
            opacity: 1;
            pointer-events: auto;
            transform: scale(1) translateY(0);
        }
        .back-to-top:hover {
            opacity: 0.88;
        }
        .back-to-top svg {
            width: 20px;
            height: 20px;
        }
        @media (min-width: 900px) {
            .back-to-top {
                bottom: 24px;
                right: 24px;
            }
        }

        /* ── PWA INSTALL BANNER ── */
        .pwa-banner {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #fff;
            border-top: 1px solid #e4e7ef;
            box-shadow: 0 -4px 24px rgba(0,0,0,0.13);
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 6px 16px 9px;
            z-index: 999;
            transform: translateY(100%);
            transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .pwa-banner.show {
            transform: translateY(0);
        }
        .pwa-banner-icon {
            width: 38px;
            height: 38px;
            min-width: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, #1a73e8 0%, #1e3a8a 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            box-shadow: 0 2px 8px rgba(26,115,232,0.3);
        }
        .pwa-banner-text {
            flex: 1;
            min-width: 0;
        }
        .pwa-banner-title {
            font-size: 14px;
            font-weight: 800;
            color: #1a1d2e;
            line-height: 1.3;
        }
        .pwa-banner-sub {
            font-size: 12px;
            color: #6b7280;
            font-weight: 500;
            margin-top: 2px;
        }
        .pwa-banner-actions {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-shrink: 0;
        }

        .pwa-btn-skip {
            background: #f3f4f6;
            color: #6b7280;
            border: 1.5px solid #e4e7ef;
            border-radius: 10px;
            padding: 8px 14px;
            font-size: 12px;
            font-weight: 700;
            font-family: var(--font);
            cursor: pointer;
            white-space: nowrap;
            transition: background 0.15s;
        }
        .pwa-btn-skip:hover {
            background: #e5e7eb;
        }
        .pwa-btn-install {
            background: linear-gradient(135deg, #1a73e8, #1e3a8a);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 8px 16px;
            font-size: 12px;
            font-weight: 800;
            font-family: var(--font);
            cursor: pointer;
            white-space: nowrap;
            box-shadow: 0 2px 8px rgba(26,115,232,0.35);
            transition: opacity 0.15s;
        }
        .pwa-btn-install:hover {
            opacity: 0.88;
        }
        /* ── SPORTSTV GUIDE MODAL ── */
        .stv-modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.55);
            z-index: 300;
            align-items: flex-end;
            justify-content: center;
            padding: 0;
        }
        .stv-modal.open { display: flex; }
        .stv-sheet {
            background: #fff;
            border-radius: 20px 20px 0 0;
            width: 100%;
            max-width: 540px;
            max-height: 92vh;
            overflow-y: auto;
            padding: 0 0 32px;
            box-shadow: 0 -8px 40px rgba(0,0,0,0.18);
            animation: slideUp 0.3s cubic-bezier(0.34,1.26,0.64,1);
        }
        @keyframes slideUp {
            from { transform: translateY(100%); }
            to   { transform: translateY(0); }
        }
        .stv-header {
            background: linear-gradient(135deg, #1a73e8 0%, #0f4fa8 100%);
            border-radius: 20px 20px 0 0;
            padding: 18px 20px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            position: sticky;
            top: 0;
            z-index: 1;
        }
        .stv-header-icon {
            width: 44px; height: 44px;
            background: rgba(255,255,255,0.18);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; flex-shrink: 0;
        }
        .stv-header-text { flex: 1; min-width: 0; }
        .stv-header-title {
            font-size: 15px; font-weight: 800;
            color: #fff; line-height: 1.2;
        }
        .stv-header-sub {
            font-size: 11px; color: rgba(255,255,255,0.8);
            margin-top: 2px;
        }
        .stv-close {
            background: rgba(255,255,255,0.2);
            border: none; color: #fff;
            border-radius: 50%; width: 32px; height: 32px;
            font-size: 16px; cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .stv-body { padding: 20px 16px 0; }
        .stv-dl-btn {
            display: flex; align-items: center; gap: 12px;
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: #fff; border-radius: 14px;
            padding: 14px 18px; text-decoration: none;
            margin-bottom: 20px;
            box-shadow: 0 4px 16px rgba(21,128,61,0.3);
            transition: opacity 0.15s;
        }
        .stv-dl-btn:hover { opacity: 0.9; }
        .stv-dl-btn-icon { font-size: 26px; flex-shrink: 0; }
        .stv-dl-btn-text { flex: 1; }
        .stv-dl-btn-label { font-size: 13px; font-weight: 800; line-height: 1.3; }
        .stv-dl-btn-sub { font-size: 11px; opacity: 0.85; margin-top: 2px; }
        .stv-dl-btn-arrow { font-size: 18px; }
        .stv-section-title {
            font-size: 13px; font-weight: 800;
            color: var(--text-primary);
            margin: 0 0 10px;
            display: flex; align-items: center; gap: 6px;
        }
        .stv-step {
            display: flex; gap: 12px;
            background: var(--bg-item);
            border: 1.5px solid var(--border);
            border-radius: 12px;
            padding: 12px 14px;
            margin-bottom: 8px;
        }
        .stv-step-num {
            width: 26px; height: 26px; min-width: 26px;
            background: #1a73e8;
            color: #fff; border-radius: 50%;
            font-size: 12px; font-weight: 800;
            display: flex; align-items: center; justify-content: center;
            margin-top: 1px;
        }
        .stv-step-body { flex: 1; min-width: 0; }
        .stv-step-title {
            font-size: 13px; font-weight: 700;
            color: var(--text-primary); line-height: 1.3;
        }
        .stv-step-desc {
            font-size: 12px; color: var(--text-secondary);
            margin-top: 3px; line-height: 1.5;
        }
        .stv-link-card {
            background: var(--bg-item);
            border: 1.5px solid var(--border);
            border-radius: 12px;
            padding: 12px 14px;
            margin-bottom: 8px;
            display: flex; align-items: center; gap: 10px;
        }
        .stv-link-icon {
            font-size: 22px; flex-shrink: 0;
        }
        .stv-link-info { flex: 1; min-width: 0; }
        .stv-link-name {
            font-size: 13px; font-weight: 700;
            color: var(--text-primary);
        }
        .stv-link-url {
            font-size: 11px; color: #1a73e8;
            margin-top: 2px;
            word-break: break-all;
        }
        .stv-link-copy {
            background: #1a73e8; color: #fff;
            border: none; border-radius: 8px;
            padding: 6px 12px; font-size: 11px;
            font-weight: 700; font-family: var(--font);
            cursor: pointer; flex-shrink: 0;
            transition: background 0.15s;
        }
        .stv-link-copy:hover { background: #1558c0; }
        .stv-divider {
            height: 1px; background: var(--border);
            margin: 16px 0;
        }
        .stv-note {
            background: #fef9c3;
            border: 1.5px solid #fde047;
            border-radius: 10px;
            padding: 10px 13px;
            font-size: 12px; color: #78350f;
            line-height: 1.5;
            margin-top: 4px;
        }

        /* ── TOP NAV ── */
        .top-nav {
            position: sticky;
            top: 0;
            background: rgba(255,255,255,0.97);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            display: flex;
            flex-wrap: nowrap;
            justify-content: flex-start;
            align-items: center;
            gap: 3px;
            padding: 3px 3px;
            overflow-x: auto;
            overflow-y: hidden;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            z-index: 100;
        }
        .top-nav::-webkit-scrollbar {
            display: none;
        }
        @media (min-width: 768px) {
            .top-nav {
                justify-content: center;
            }
        }
        .nav-item {
            flex: 0 0 auto;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 4px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.2px;
            white-space: nowrap;
            color: var(--text-secondary);
            cursor: pointer;
            padding: 6px 10px;
            border-radius: 16px;
            background: rgba(0,0,0,0.04);
            transition: color 0.2s, background 0.2s;
            text-decoration: none;
        }
        .nav-item.active {
            color: #fff;
            background: var(--blue);
        }
        .nav-icon {
            font-size: 14px;
        }
        .announcement-overlay{position:fixed;inset:0;z-index:9999;display:grid;place-items:center;padding:20px;background:rgba(2,10,20,.76);backdrop-filter:blur(4px)}
        .announcement-overlay[hidden]{display:none}.announcement-box{position:relative;width:min(540px,100%);max-height:min(72vh,620px);overflow:auto;background:linear-gradient(145deg,#0d2138,#091a2d);border:1px solid #2d6999;border-radius:18px;padding:27px 28px;box-shadow:0 25px 75px rgba(0,0,0,.5),0 0 0 1px rgba(70,165,255,.08) inset;animation:announcementIn .22s ease-out}.announcement-box::before{content:'';position:absolute;inset:0 0 auto;height:4px;border-radius:18px 18px 0 0;background:linear-gradient(90deg,#1684ed,#55b7ff,#1684ed)}.announcement-box h2{margin:0 42px 14px 0;color:#fff;font-size:22px;text-shadow:0 1px 8px rgba(0,0,0,.25)}.announcement-content{color:#c7dff4;line-height:1.7;white-space:pre-wrap;overflow-wrap:anywhere}.announcement-close{position:absolute;top:12px;right:13px;width:36px;height:36px;border:1px solid #35658c;border-radius:50%;background:#143553;color:#8dceff;font-size:25px;line-height:1;cursor:pointer;transition:.15s ease}.announcement-close:hover{background:#207bc5;border-color:#64baff;color:#fff;transform:scale(1.05)}@keyframes announcementIn{from{opacity:0;transform:translateY(12px) scale(.97)}to{opacity:1;transform:none}}
    </style>
</head>
<body>
<?php if ($announcement['enabled'] && $announcement['content'] !== ''): ?>
<div class="announcement-overlay" id="announcementPopup" role="dialog" aria-modal="true" aria-labelledby="announcementTitle" data-announcement-id="<?= htmlspecialchars(hash('sha256', $announcement['updated_at'] . "\n" . $announcement['title'] . "\n" . $announcement['content']), ENT_QUOTES, 'UTF-8') ?>" hidden>
    <article class="announcement-box"><button class="announcement-close" type="button" aria-label="Đóng thông báo">&times;</button><h2 id="announcementTitle"><?= htmlspecialchars($announcement['title'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></h2><div class="announcement-content"><?= htmlspecialchars($announcement['content'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></div></article>
</div>
<script>document.addEventListener('DOMContentLoaded',()=>{const popup=document.getElementById('announcementPopup');if(!popup)return;const storageKey='tinhlagi_announcement_'+popup.dataset.announcementId;try{if(sessionStorage.getItem(storageKey)==='seen')return;sessionStorage.setItem(storageKey,'seen')}catch(e){}popup.hidden=false;const close=()=>{popup.hidden=true};popup.querySelector('.announcement-close').addEventListener('click',close);document.addEventListener('click',close,{once:true});});</script>
<?php endif; ?>

    <nav class="top-nav">
        <a href="https://caodanh.io.vn/app" class="nav-item active">
            <span class="nav-icon">🏠</span><span>Home</span>
        </a>
        <a href="https://tinhlagi.pro/movie/" class="nav-item active" target="_blank" rel="noopener noreferrer">
            <span class="nav-icon">🎬</span><span>Movie</span>
        </a>
        <a href="https://tinhlagi.pro/sport/" class="nav-item active" target="_blank" rel="noopener noreferrer">
            <span class="nav-icon">⚽</span><span>Sport</span>
        </a>
        <a href="https://tinhlagi.pro/tiktok/" class="nav-item active" target="_blank" rel="noopener noreferrer">
            <span class="nav-icon">✨</span><span>Tiktok</span>
        </a>
        <a href="https://tinhlagi.pro/tivi/" class="nav-item active" target="_blank" rel="noopener noreferrer">
            <span class="nav-icon">📺</span><span>Tivi</span>
        </a>
        <a href="https://tinhlagi.pro/music/" class="nav-item active" target="_blank" rel="noopener noreferrer">
            <span class="nav-icon">🎵</span><span>Music</span>
        </a>

        <a href="https://tinhlagi.pro" class="nav-item active" target="_blank" rel="noopener noreferrer">
            <span class="nav-icon">🌟</span><span>Tinhlagi.pro</span>
        </a>
    </nav>

    <header class="hero">
        <h1 class="hero-title"><?= htmlspecialchars($page_title) ?></h1>
        <p class="hero-sub">
            <?= htmlspecialchars($page_sub) ?>
        </p>
    </header>

    <div class="code-row">

        <a target="_blank" rel="noopener noreferrer" href="https://go.aftvnews.com/">🌐 Web tạo CODE cài APP</a>
        <a href="https://caodanh.io.vn/app/huongdan_code.php">📋 Hướng dẫn lấy CODE để cài APP</a>
        <a href="https://caodanh.io.vn/app/huongdan_sendtofile.php">📋 Hướng dẫn Send to File</a>
        <a href="#" onclick="openSportsTVGuide();return false;">⚽ Hướng dẫn SportsTV IPTV</a>

    </div>
    <div class="search-wrap">
        <div class="search-box">
            <span class="search-icon">🔍</span>
            <input type="text" placeholder="Tìm kiếm ứng dụng..." oninput="filterApps(this.value)">
        </div>
    </div>

    <main class="content">
        <div class="cats-grid" id="appList">

            <?php foreach ($categories as $cat): ?>
            <?php $count = count($cat['apps']); ?>
            <div class="cat-card" data-cat="<?= htmlspecialchars($cat['title']) ?>">
                <div class="cat-header">
                    <span class="cat-emoji"><?= $cat['icon'] ?></span>
                    <span class="cat-title"><?= htmlspecialchars($cat['title']) ?></span>
                    <span class="cat-count"><?= $count ?> app</span>
                </div>
                <div class="cat-items">
                    <?php foreach ($cat['apps'] as $app): ?>
                    <div class="app-item">
                        <div class="app-avatar <?= htmlspecialchars($app['color']) ?>">
                            <?= htmlspecialchars($app['abbr']) ?>
                        </div>
                        <div class="app-info">
                            <div class="app-name">
                                <?= htmlspecialchars($app['name']) ?>
                            </div>
                            <div class="app-meta">
                                <?php
                                $downloadId = appDownloadId($app);
                                $savedCount = filter_var($downloadCounts[$downloadId] ?? null, FILTER_VALIDATE_INT);
                                $downloadCount = ($savedCount !== false && $savedCount >= 0) ? $savedCount : $defaultDownloadCount;
                                ?>
                                <?= htmlspecialchars($app['ver']) ?> • <?= number_format($downloadCount, 0, ',', '.') ?> lượt tải
                            </div>
                        </div>
                        <div class="app-actions">
                            <?php if (!empty($app['code'])): ?>
                            <button class="btn-code" onclick="toggleCode(this)">CODE</button>
                            <span class="code-badge" onclick="copyCode(this)" title="Bấm để copy"><?= htmlspecialchars($app['code']) ?></span>
                            <?php else : ?>
                            <button class="btn-code" disabled style="opacity:0.4;cursor:default">CODE</button>
                            <?php endif; ?>
                            <button
                                class="btn-icon copy-link-btn"
                                type="button"
                                title="Copy link"
                                data-app-name="<?= htmlspecialchars($app['name'], ENT_QUOTES, 'UTF-8') ?>"
                                data-app-link="<?= htmlspecialchars((string) ($app['link'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
                            >🔗</button>
                            <a class="btn-dl" href="/app/?download=<?= htmlspecialchars($downloadId) ?>" title="Tải xuống">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v13M7 11l5 5 5-5" /><path d="M4 20h16" /></svg>
                                Tải
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </main>



    <!-- Copy Link Modal -->
    <div class="copy-modal" id="copyModal">
        <div class="copy-box">
            <div class="copy-title">
                🔗 Link tải: <span id="modalAppName"></span>
            </div>
            <input class="copy-input" id="modalLink" type="text" readonly onclick="this.select()">
            <div class="copy-actions">
                <button class="copy-btn-close" onclick="closeModal()">Đóng</button>
                <button class="copy-btn-copy" onclick="doCopy()">Copy Link</button>
            </div>
        </div>
    </div>

    <!-- Online Badge -->
    <div class="online-badge" id="websiteOnlineBadge" style="display:none;">
        <span class="online-dot"></span>
        <span id="websiteOnlineText">...</span>
    </div>

    <!-- PWA Install Banner -->
    <!-- SPORTSTV GUIDE MODAL -->
    <div class="stv-modal" id="stvModal" onclick="if(event.target===this)closeSportsTVGuide()">
      <div class="stv-sheet">
        <div class="stv-header">
          <div class="stv-header-icon">⚽</div>
          <div class="stv-header-text">
            <div class="stv-header-title">Hướng dẫn SportsTV IPTV</div>
            <div class="stv-header-sub">Xem thể thao &amp; kênh TV trực tiếp miễn phí</div>
          </div>
          <button class="stv-close" onclick="closeSportsTVGuide()">✕</button>
        </div>
        <div class="stv-body">

          <!-- Download button -->
          <a class="stv-dl-btn" href="https://pub-fb13fe1daa2c4cf0acf3075c535924da.r2.dev/app/SportsTV_5.2.3.apk">
            <div class="stv-dl-btn-icon">📥</div>
            <div class="stv-dl-btn-text">
              <div class="stv-dl-btn-label">Tải SportsTV v5.2.3.apk</div>
              <div class="stv-dl-btn-sub">Miễn phí · Dành cho Tivi/Box/Mobile Android</div>
            </div>
            <div class="stv-dl-btn-arrow">→</div>
          </a>

          <!-- Bước cài đặt -->
          <div class="stv-section-title">🔧 Các bước cài đặt &amp; thêm nguồn</div>

          <div class="stv-step">
            <div class="stv-step-num">1</div>
            <div class="stv-step-body">
              <div class="stv-step-title">Tải &amp; cài file APK</div>
              <div class="stv-step-desc">Nhấn nút xanh phía trên để tải <b>SportsTV_5.2.3.apk</b>. Sau khi tải xong, mở file và chọn <b>Cài đặt</b>. Nếu bị chặn, vào <i>Cài đặt → Bảo mật → Cho phép nguồn không xác định</i>.</div>
            </div>
          </div>

          <div class="stv-step">
            <div class="stv-step-num">2</div>
            <div class="stv-step-body">
              <div class="stv-step-title">Mở ứng dụng SportsTV</div>
              <div class="stv-step-desc">Sau khi cài xong, mở app. Tại màn hình chính chọn <b>dấu + (Add playlist)</b> để thêm nguồn kênh.</div>
            </div>
          </div>

          <div class="stv-step">
            <div class="stv-step-num">3</div>
            <div class="stv-step-body">
              <div class="stv-step-title">Nhập link danh sách kênh (M3U / IPTV)</div>
              <div class="stv-step-desc">Chọn <b>"Add URL"</b>, dán link bên dưới vào ô URL rồi nhấn <b>OK / Xác nhận</b>. App sẽ tự tải danh sách kênh.</div>
            </div>
          </div>

          <div class="stv-step">
            <div class="stv-step-num">4</div>
            <div class="stv-step-body">
              <div class="stv-step-title">Chọn kênh &amp; xem trực tiếp</div>
              <div class="stv-step-desc">Sau khi tải xong playlist, chọn nhóm kênh (thể thao / TV) và nhấn kênh muốn xem. Nếu kênh lỗi, thử đổi sang link playlist còn lại.</div>
            </div>
          </div>

          <div class="stv-divider"></div>

          <!-- Link IPTV -->
          <div class="stv-section-title">📡 Link IPTV – Dán vào ô URL trong app</div>

          <div class="stv-link-card">
            <div class="stv-link-icon">⚽</div>
            <div class="stv-link-info">
              <div class="stv-link-name">Full nguồn Thể Thao (367 kênh)</div>
              <div class="stv-link-url">https://bit.ly/tinhlagibongda</div>
            </div>
            <button class="stv-link-copy" onclick="stvCopy('https://bit.ly/tinhlagibongda',this)">Copy</button>
          </div>

          <div class="stv-link-card">
            <div class="stv-link-icon">📺</div>
            <div class="stv-link-info">
              <div class="stv-link-name">Full kênh Tivi Việt Nam (641 kênh)</div>
              <div class="stv-link-url">https://bit.ly/tinhlagitivi</div>
            </div>
            <button class="stv-link-copy" onclick="stvCopy('https://bit.ly/tinhlagitivi',this)">Copy</button>
          </div>

          <div class="stv-note">
            💡 <b>Lưu ý:</b> Có thể thêm cả 2 link để có đầy đủ kênh thể thao lẫn kênh truyền hình. Link tự động cập nhật, không cần thay lại.
          </div>

        </div>
      </div>
    </div>
    <!-- /SPORTSTV GUIDE MODAL -->

    <!-- Back to Top -->
    <button class="back-to-top" id="backToTop" title="Lên đầu trang" onclick="window.scrollTo({top:0,behavior:'smooth'})">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
    </button>

    <div class="pwa-banner" id="pwaBanner">
        <div class="pwa-banner-icon">
            📲
        </div>
        <div class="pwa-banner-text">
            <div class="pwa-banner-title">
                Cài App TINHLAGI
            </div>
            <div class="pwa-banner-sub">
                Tải App mới nhất, nhanh nhất!
            </div>
        </div>
        <div class="pwa-banner-actions">
            <button class="pwa-btn-skip" id="pwaDismiss">Bỏ qua</button>
            <button class="pwa-btn-install" id="pwaInstall">Cài đặt</button>
        </div>
    </div>

    <script>
        // ── PWA: Register Service Worker ──
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/app/sw.js?v=8').catch(() => {});
        }


        // ── PWA Install Banner logic ──
        let deferredPrompt = null;
        const banner = document.getElementById('pwaBanner');
        const btnInst = document.getElementById('pwaInstall');
        const btnDism = document.getElementById('pwaDismiss');

        // Chỉ ẩn nếu đã cài app rồi (standalone), còn bỏ qua thì lần sau vẫn hiện lại
        const isStandalone = window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone === true;

        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            if (!isStandalone) {
                setTimeout(() => banner.classList.add('show'), 1200);
            }
        });

        btnInst.addEventListener('click', async () => {
            banner.classList.remove('show');
            if (deferredPrompt) {
                deferredPrompt.prompt();
                deferredPrompt = null;
            }
        });

        btnDism.addEventListener('click', () => {
            banner.classList.remove('show');
            // Không lưu gì cả → lần sau vào web vẫn hiện lại
        });

        // Nếu đã cài (standalone) → ẩn hẳn
        if (isStandalone) {
            banner.style.display = 'none';
        }
    </script>

    <script>
        function toggleCode(btn) {
            const badge = btn.nextElementSibling;
            badge.classList.toggle('visible');
        }
        async function copyText(text, input) {
            if (navigator.clipboard && typeof navigator.clipboard.writeText === 'function') {
                try { await navigator.clipboard.writeText(text); return true; } catch (_) {}
            }
            const field = input || document.createElement('textarea');
            if (!input) {
                field.value = text;
                field.style.position = 'fixed';
                field.style.opacity = '0';
                document.body.appendChild(field);
            }
            field.select();
            field.setSelectionRange(0, field.value.length);
            let copied = false;
            try { copied = typeof document.execCommand === 'function' && document.execCommand('copy'); } catch (_) {}
            if (!input) field.remove();
            return !!copied;
        }
        async function copyCode(badge) {
            const code = badge.dataset.copyValue || badge.textContent.trim();
            badge.dataset.copyValue = code;
            const ok = await copyText(code);
            badge.textContent = ok ? '✅ Đã copy!' : code;
            if (!ok) {
                const range = document.createRange();
                range.selectNodeContents(badge);
                const selection = window.getSelection();
                if (selection) { selection.removeAllRanges(); selection.addRange(range); }
                badge.title = 'Không copy tự động được. Hãy copy mã đã chọn.';
            }
            clearTimeout(badge.copyTimer);
            badge.copyTimer = setTimeout(() => badge.textContent = code, 1500);
        }
        function copyLink(name, link) {
            const input = document.getElementById('modalLink');
            document.getElementById('modalAppName').textContent = name;
            input.value = new URL(link, window.location.href).href;
            document.getElementById('copyModal').classList.add('open');
            const btn = document.querySelector('.copy-btn-copy');
            clearTimeout(btn.copyTimer);
            btn.textContent = 'Copy Link';
            input.select();
            void copyText(input.value, input);
        }
        async function doCopy() {
            const input = document.getElementById('modalLink');
            const btn = document.querySelector('.copy-btn-copy');
            const ok = await copyText(input.value, input);
            btn.textContent = ok ? '✅ Đã copy!' : 'Hãy copy link đã chọn';
            clearTimeout(btn.copyTimer);
            btn.copyTimer = setTimeout(() => btn.textContent = 'Copy Link', 1500);
        }

        document.querySelectorAll('.copy-link-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                copyLink(btn.dataset.appName || '', btn.dataset.appLink || '');
            });
        });

        function closeModal() {
            document.getElementById('copyModal').classList.remove('open');
            document.querySelector('.copy-btn-copy').textContent = 'Copy Link';
        }
        document.getElementById('copyModal').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });

        function filterApps(q) {
            const query = q.toLowerCase().trim();
            document.querySelectorAll('.app-item').forEach(item => {
                const name = item.querySelector('.app-name').textContent.toLowerCase();
                item.style.display = (query === '' || name.includes(query)) ? '': 'none';
            });
            document.querySelectorAll('.cat-card').forEach(card => {
                const visible = [...card.querySelectorAll('.app-item')].some(i => i.style.display !== 'none');
                card.style.display = visible ? '': 'none';
            });
        }

        // ── BACK TO TOP ──
        (function() {
            var btn = document.getElementById('backToTop');
            if (!btn) return;
            function onScroll() {
                if (window.scrollY > 300) btn.classList.add('show');
                else btn.classList.remove('show');
            }
            window.addEventListener('scroll', onScroll, { passive: true });
            onScroll();
        })();

    </script>
    <script>
        (function() {
            function safeGet(k, d) {
                try { return localStorage.getItem(k) || d; } catch(e) { return d; }
            }
            function safeSet(k, v) {
                try { localStorage.setItem(k, v); } catch(e) {}
            }

            function render(count) {
                var el = document.getElementById('websiteOnlineBadge');
                var tx = document.getElementById('websiteOnlineText');
                if (el && tx && count != null) {
                    el.style.display = '';
                    el.classList.add('show');
                    tx.innerText = count + ' online';
                }
            }

            var failures=0,nextRetry=0;
            function update() {
                if(document.hidden||!navigator.onLine||Date.now()<nextRetry)return;
                var now    = Date.now();
                var last   = parseInt(safeGet('last_online_ping', '0'), 10);
                var cached = safeGet('website_online_count');
                if (cached) render(cached);
                if (now - last < 30000) return;
                safeSet('last_online_ping', now.toString());

                fetch('/app/online_count.php', {
                    method: 'POST',
                    credentials: 'same-origin',
                    cache: 'no-store',
                    headers: { 'Content-Type': 'application/json' },
                    body: '{}'
                })
                .then(function(response) {
                    if (!response.ok) throw new Error('Online endpoint failed');
                    return response.json();
                })
                .then(function(data) {
                    var count = data && Number.isFinite(Number(data.count)) ? Number(data.count) : 1;
                    count = Math.max(1, count);
                    failures=0;nextRetry=Date.now()+30000;
                    safeSet('website_online_count', count.toString());
                    render(count);
                })
                .catch(function() {
                    failures++;nextRetry=Date.now()+Math.min(300000,30000*Math.pow(2,Math.min(failures,4)))+Math.random()*5000;
                });
            }

            window.addEventListener('storage', function(e) {
                if (e.key === 'website_online_count') render(e.newValue);
            });

            function init() {
                update();
                if (window._oi) clearInterval(window._oi);
                window._oi = setInterval(update, 10000);
            }

            if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
            else init();
            window.addEventListener('pageshow', init);
        })();

        // ── SPORTSTV GUIDE MODAL ──
        function openSportsTVGuide() {
            document.getElementById('stvModal').classList.add('open');
            document.body.style.overflow = 'hidden';
        }
        function closeSportsTVGuide() {
            document.getElementById('stvModal').classList.remove('open');
            document.body.style.overflow = '';
        }
        async function stvCopy(text, btn) {
            const orig = btn.dataset.copyLabel || btn.textContent;
            btn.dataset.copyLabel = orig;
            const ok = await copyText(text);
            btn.textContent = ok ? '✓ Đã copy' : 'Copy thủ công';
            if (!ok) copyLink('Link hướng dẫn', text);
            clearTimeout(btn.copyTimer);
            btn.copyTimer = setTimeout(() => btn.textContent = orig, 2000);
        }
    </script>
</body>
</html>
