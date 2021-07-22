
let mapa, circulo;
let imgClone;

function preload() {
  mapa = loadImage('data/mapa.png');
}
 
function setup() {
  createCanvas(1500, 720);



}

function draw() { 
  background(255);
  circulo = createGraphics(mapa.width, mapa.height);
  circulo.ellipse(mouseX,mouseY, 900); // cuando muevo el mouse entre 0 y 400, lleno las letras con la mascara
  ( imgClone = mapa.get() ).mask( circulo.get() );

  image(imgClone,0,0);
  drawDemoMask();
  circulo.remove ();
  }

function drawDemoMask(){
  noStroke();
  textStyle(BOLD);
  textAlign(LEFT);
  fill(255,230);
  textSize(210);
  text("SOY,", 100, height/2.5);
  text("LATINO",100,height/1.47);
  text("AMÉRICA", 100, height/1.02);
}
 
p5.Graphics.prototype.remove = function() {
  if (this.elt.parentNode) {
    this.elt.parentNode.removeChild(this.elt);
  }
  var idx = this._pInst._elements.indexOf(this);
  console.log(this._pInst);
  if (idx !== -1) {
    this._pInst._elements.splice(idx, 1);
  }
  for (var elt_ev in this._events) {
    this.elt.removeEventListener(elt_ev, this._events[elt_ev]);
  }
};