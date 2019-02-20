<?php
	$value = $_POST["value"];
	
	if (empty($value) == true){
		echo "Erro de valor nulo";
    }else if($value <= 0){
		echo "Erro de valor inválido";
	}else if(($value % 10)!=0){
		echo "Erro de notas indisponíveis";
	}else{
        //100=[0], 50=[1], 20=[2], 10=[3]    
        $nts = array(0,0,0,0);
        $res = "[";
        //Para dizer se já tem um numero na string
        $flare = false;

        $nts[0]=intdiv($value,100);
        $value=$value%100;
        $res=strfun($nts[0], $res, "100.00",$flare);
        
        if($nts[0]>0){
            $flare=true;
        }

        $nts[1]=intdiv($value,50);
        $value=$value%50;
        $res=strfun($nts[1], $res, "50.00",$flare);

        if($nts[1]>0){
            $flare=true;
        }

        $nts[2]=intdiv($value,20);
        $value=$value%20;
        $res=strfun($nts[2], $res, "20.00",$flare);

        if($nts[2]>0){
            $flare=true;
        }

        $nts[3]=intdiv($value,10);
        $value=$value%10;
        $res=strfun($nts[3], $res, "10.00",$flare);

        $res = $res."]";
        echo $res;
    }

    function strfun($num, $str, $ced, $flare){
        $cont=0;
        while($cont<$num){
            if($cont>0 || $flare==true){
                $str=$str.", ";    
            }
            $str=$str.$ced;
            $cont++;
        }
        return $str;
    }
?>
<html>
<form action="voltar.php" method="post" align ="center">
			<input type="submit" value="Voltar">
		</form>
	</body>
</html>