<?php
    require '../vendor/autoload.php';
    require 'util.php';

    function main () {
        $db = connectMysql ();

        $d = $_POST['D'];
        $i = $_POST['I'];
        $s = $_POST['S'];
        $c = $_POST['C'];

        $discArr = [
            'D' => $d,
            'I' => $i,
            'S' => $s,
            'C' => $c
        ];
        arsort($discArr);

        $type = '';
        $type_ = 'CI';

        $typeArr = json_decode('{"D":"감독자형","DI":"결과지향형","DIS":"관계중심적지도자형","DIC":"대법관형","DS":"성취자형","DSI":"업무중심적 지도자형","DSC":"전문가형","DC":"개척자형","DCI":"대중강사형","DCS":"마에스터형","I":"분위기 메이커형","ID":"설득가형","IDS":"정치가형","IDC":"지도자형","IS":"격려자형","ISD":"헌신자형","ISC":"코치형","IC":"대인협상가형","ICD":"업무협상가형","ICS":"조정자형","S":"팀플레이어형","SD":"전문적 성취자형","SDI":"디자이너형","SDC":"수사관형","SI":"조언자형","SID":"평화적리더형","SIC":"상담자","SC":"관리자형","SCD":"전략가형","SCI":"평화중재자형","C":"논리적사고형","CD":"설계자형","CDI":"프로듀서형","CDS":"심사숙고형","CI":"평론가형","CID":"작가형","CIS":"중재자형","CS":"원칙중심형","CSD":"국난극복형","CSI":"교수형"}', true);

        foreach ($discArr as $key => $value) {
            if ($value >= 35) {
                $type .= $key;
            }
            else {
                break;
            }
        }

        if ($type == '') {
            $type = array_keys($discArr)[0];
        }

        $type = substr($type, 0, 3);
        $type_ = $typeArr[$type];

        // 마지막으로 생성된 ID 가져오기
        $uid = checkSession ();

        if ($uid) {
            $db = connectMysql();

            $query = "INSERT INTO result (uid, d, i, s, c, type, type_) VALUES (?, ?, ?, ?, ?, ?, ?)";

            $stmt = $db->prepare($query);
            $stmt->execute([$uid, $d, $i, $s, $c, $type, $type_]);

            $query = "UPDATE user_info SET disc = ?, disc_name = ? WHERE uid = ?";

            $stmt = $db->prepare($query);
            $stmt->execute([$type, $type_, $uid]);

            return true;
        }
        else {
            header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
            exit;
        }
    }

    echo json_encode(main());
?>
