<!--http://localhost/kadai1/tsuikakadai7.php-->

<!doctype html>
<html lang=ja>
    <head>
        <meta charset="utf-8">
        <title>追加課題７</title>
    </head>
    
    <body>
        <script type="text/javascript">
            function toOneDimension($previousValue,$currentValue){
                return $previousValue.concat($currentValue);
            }
            var $sampleArrayA = [
                ['A1','A2','A3'],
                ['B1','B2','B3'],
                ['C1','C2','C3']
            ];
            
            
            var $sampleArrayB = $sampleArrayA.reduce(toOneDimension).reverse();
//            var $sampleArrayB = $sampleArrayB.reverse();
//            できた
            
            for(var $counterVar = 0;$counterVar<$sampleArrayB.length;$counterVar++){
                document.write('$sampleArrayB['+$counterVar+']:');
                document.write($sampleArrayB[$counterVar]);
                document.write('<br/>');
            }
            
        </script>
    </body>
</html>