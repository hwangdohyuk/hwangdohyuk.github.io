<?php
    // 폼 전송 시 계산 처리
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // 어떤 도형 계산인지 판별
        $shape = $_POST['shape'];
        
        switch ($shape) {
            case 'triangle':
                // 삼각형 면적 = 1/2 * base * height
                $base = floatval($_POST['base']);
                $height = floatval($_POST['height']);
                $area = 0.5 * $base * $height;
                echo "<h3>삼각형 면적 결과</h3>";
                echo "밑변 = {$base}, 높이 = {$height} => 면적 = {$area}";
                break;
                
            case 'rectangle':
                // 직사각형 면적 = width * height
                $width = floatval($_POST['width']);
                $height = floatval($_POST['height']);
                $area = $width * $height;
                echo "<h3>직사각형 면적 결과</h3>";
                echo "가로 = {$width}, 세로 = {$height} => 면적 = {$area}";
                break;

            case 'circle':
                // 원 면적 = pi * radius^2
                $radius = floatval($_POST['radius']);
                $area = M_PI * pow($radius, 2);
                echo "<h3>원 면적 결과</h3>";
                echo "반지름 = {$radius} => 면적 = {$area}";
                break;
            
            case 'rectsolid':
                // 직육면체 체적 = width * length * height
                $width = floatval($_POST['width']);
                $length = floatval($_POST['length']);
                $height = floatval($_POST['height']);
                $volume = $width * $length * $height;
                echo "<h3>직육면체 체적 결과</h3>";
                echo "가로 = {$width}, 세로 = {$length}, 높이 = {$height} => 체적 = {$volume}";
                break;

            case 'cylinder':
                // 원통 체적 = pi * radius^2 * height
                $radius = floatval($_POST['radius']);
                $height = floatval($_POST['height']);
                $volume = M_PI * pow($radius, 2) * $height;
                echo "<h3>원통 체적 결과</h3>";
                echo "반지름 = {$radius}, 높이 = {$height} => 체적 = {$volume}";
                break;

            case 'sphere':
                // 구 체적 = 4/3 * pi * radius^3
                $radius = floatval($_POST['radius']);
                $volume = (4.0 / 3.0) * M_PI * pow($radius, 3);
                echo "<h3>구 체적 결과</h3>";
                echo "반지름 = {$radius} => 체적 = {$volume}";
                break;

            default:
                echo "알 수 없는 도형입니다.";
        }
    }
    ?>