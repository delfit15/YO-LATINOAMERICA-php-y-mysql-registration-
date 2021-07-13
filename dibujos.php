ß
<?php
    
    session_start(); //inicio sesión (obligatorio)
    include('conexion_db.php'); //incluyo ingreso a base de datos
    
   // $linker=new mysqli($host,$username,$pass, $db);
    
   // $tabla = "$db.items";
    //$tabla10 = "$db.admin";
    $tablaIMGS = "$db.imagenes";
    
    $sql ="SELECT * FROM $tablaIMGS";
   // WHERE usuario='".$_SESSION['usuario']."'
    $query = $linker->query($sql);
    
    
    
    
    $index = 0;
    
    $imagenes = array();
    //leo nombre de registros armando una opcion por cada uno
    while ($row = $query->fetch_assoc())
    {
        $imagenes[$index] = $row['rutaimagenes'];
        $index++;
    }
	


?>

<div>

<script type='text/javascript'>
<?php   
    $js_array = json_encode($imagenes);
    echo "var javascript_array = ". $js_array . ";\n";
?>

</script>


<?php

    echo '<script type="text/processing">
    
    int numBalls = '.$index.';
    
    float spring = 0.5;
    
    float gravity = 0.00000009;
    
    Ball[] balls = new Ball[numBalls];
    
    PImage[] img = new PImage[2];
    
    void setup()
    
    {
        
        size(400, 400,P2D);
        
        noStroke();
        
        smooth();
        
        for (int i = 0; i < numBalls; i++) {
            
            balls[i] = new Ball(random(width), random(height), random(50, 100), i, balls);
            
            img[i]=loadImage("imagenes/"+javascript_array[i]);
            
        }
        
        
        
        
    }
    
    
    
    void draw()
    
    {
        background(0);
        
        for (int i = 0; i < numBalls; i++) {
            
            balls[i].collide();
            
            balls[i].move();
            
            balls[i].display();
            
        }
        
    }
    
    
    
    class Ball {
        
        float x, y;
        
        float diameter;
        
        float vx = 0;
        
        float vy = 0;
        
        int id;
        
        Ball[] others;
        
        
        
        Ball(float xin, float yin, float din, int idin, Ball[] oin) {
            
            x = xin;
            
            y = yin;
            
            diameter = din;
            
            id = idin;
            
            others = oin;
            
        }
        
        
        
        void collide() {
            
            for (int i = id + 1; i < numBalls; i++) {
                
                float dx = others[i].x - x;
                
                float dy = others[i].y - y;
                
                float distance = sqrt(dx*dx + dy*dy);
                
                float minDist = others[i].diameter/2 + diameter/2;
                
                if (distance < minDist) {
                    
                    float angle = atan2(dy, dx);
                    
                    float targetX = x + cos(angle) * minDist;
                    
                    float targetY = y + sin(angle) * minDist;
                    
                    float ax = (targetX - others[i].x) * spring;
                    
                    float ay = (targetY - others[i].y) * spring;
                    
                    vx -= ax;
                    
                    vy -= ay;
                    
                    others[i].vx += ax;
                    
                    others[i].vy += ay;
                    
                }
                
            }
            
        }
        
        
        
        void move() {
            
            vy += gravity;
            
            x += vx+1;
            
            y += vy;
            
            if (x + diameter/2 > width) {
                
                x = width - diameter/2;
                
                vx += -0.9;
                
            }
            
            else if (x - diameter/2 < 0) {
                
                x = diameter/2;
                
                vx *= -0.9;
                
            }
            
            if (y + diameter/2 > height) {
                
                y = height - diameter/2;
                
                vy *= -0.9; 
                
            } 
            
            else if (y - diameter/2 < 0) {
                
                y = diameter/2;
                
                vy *= -0.9;
                
            }
            
        }
        
        
        
        void display() {
            
            fill(255, 204);
         
            ellipse(x, y, diameter, diameter);
            image(img[id], x-(diameter/4), y-(diameter/4) ,diameter/2 ,diameter/2);
            
        }
        
    }
    </script>
    
    ';
    ?>
