<?php
    // (2) 폼 전송 시 처리
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $n = intval($_POST['n']);
        
        // (3) 입력값 유효성 검사: n은 1 이상 100 이하여야 함
        if ($n < 1 || $n > 100) {
            echo "<p style='color:red;'>1 이상 100 이하의 정수를 입력해주세요.</p>";
            exit;
        }
        
        // (4) 피보나치 수열 생성
        // 보통 F1 = 1, F2 = 1로 시작
        // 각 항의 비율 (다음 항/현재 항)을 구하기 위해 n번째 항뿐만 아니라 n+1번째 항도 필요함
        $fib = array();
        $fib[1] = 1; // F1
        $fib[2] = 1; // F2
        
        // n항만 필요한 경우에도 비율 계산을 위해 F(n+1)까지 생성합니다.
        if ($n > 1) {
            for ($i = 3; $i <= $n + 1; $i++) {
                $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
            }
        } else {
            // n이 1인 경우, 비율 계산을 위해 F2도 미리 정해둠 (이미 1로 설정됨)
            // 굳이 추가 연산이 필요없음
        }
        
        // (5) 결과 출력: 각 항의 값과 (다음 항)/(현재 항) 비율을 테이블로 보여줌
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr>
                <th>항</th>
                <th>피보나치 수</th>
                <th>(다음 항) / (현재 항)</th>
              </tr>";
        for ($i = 1; $i <= $n; $i++) {
            // 항의 비율 계산: 피보나치 수가 0인 경우를 고려해 에러를 방지함
            $ratio = ($fib[$i] != 0) ? ($fib[$i + 1] / $fib[$i]) : 0;
            // 보기 좋게 소수점 6자리까지 포맷팅
            $ratioFormatted = number_format($ratio, 6);
            
            echo "<tr>";
            echo "<td>{$i}</td>";
            echo "<td>{$fib[$i]}</td>";
            echo "<td>{$ratioFormatted}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>