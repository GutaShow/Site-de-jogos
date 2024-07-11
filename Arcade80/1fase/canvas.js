var myGamePiece;
var myObstacles = [];
var myScore;
var myEnemy;
var caneca = [];
var veloc;
var velo;
let score;
var speed;
var dano
var myGameArea;
var mySound;
var cura;
var curacar;
var vida;
var myVida
var sirene
var vidaimg
var ladrao
var powerdown = [];
var corintia
var calvo
var calvopro
var calvomus
var djeni
var men50
var mai10
var mai1
var men1
var mel
var skin
var jes
var melmus

score = -15
speed = -10
velo = 3
veloc = -3
vida = 1
dano = 1

let randomX = Math.floor(Math.random() * 761)
let randomY = Math.floor(Math.random() * 550)
let powerX = Math.floor(Math.random() * 761)
let powerY = Math.floor(Math.random() * 550)
let powerT = Math.floor(Math.random() * 50000)
let powerY1 = Math.floor(Math.random() * 550)
let powerT2 = Math.floor(Math.random() * 1000)
let randomX2 = Math.floor(Math.random() * 761)
let randomY2 = Math.floor(Math.random() * 550)
let powerX2 = Math.floor(Math.random() * 761)
let powerY2 = Math.floor(Math.random() * 550)
let powerX3 = Math.floor(Math.random() * 761)
let powerY3 = Math.floor(Math.random() * 550)
let melpro = false
let calvin = false
let jes1 = false
let jes2 = false
let jes3 = false

function startGame() {

  myGamePiece = new component(140, 80, "img/nave1.png", 10, 280, "image");
  myObstacle = new component(140, 40, "img/bolafog.png", 1900, 120, "image");
  myScore = new component("30px", "Consolas", "white", 400, 40, "text");
  mel = new component(40, 40, "img/mel.png", 20000, 20000, "image" )
  skin = new component(140, 80, "img/nave2.png", 20000, 20000, "image");
  men50 = new component(90, 90, "img/-50.png", 470, 1000, "image")
  mai10 = new component(90, 90, "img/+10.png", 470, 1000, "image")
  mai1 = new component(90, 90, "img/+1.png", 70, 1000, "image")
  men1 = new component(90, 90, "img/-1.png", 70, 1000, "image")
  myVida = new component("30px", "Consolas", "white", 100, 40, "text")
  vidaimg = new component(50, 40, "img/vida.png", 50, 13, "image")
  myEnemy = new component(200, 600, "img/Inimigos.png", 800, 0, "image")
  caneca = new component(40, 40, "img/caneca.png", randomX, randomY, "image")
  curacar = new component(210, 115, "img/healcar.png", 2000, 485, "image")
  sirene = new sound("som/sirene.mp3")
  corintia = new sound("som/corintia.mp3")
  melmus= new sound("som/melmus.mp3")
  calvomus = new sound("som/calvo.mp3")
  cura = new component(40, 40, "img/heal.png", 10000, 0, "image")
  ladrao = new component(200, 200, "img/spezia.png", -300, 410, "image")
  djeni = new component(40, 40, "img/djeni.png", 1000, 1000, "image")
  powerdown = new component(40, 40, "img/ladrao.png", 1000, powerY1, "image")
  calvo = new component(40, 40, "img/calvo.png", 1000, 1000, "image")
  calvopro = new component(150, 200, "img/calvoprotect.png", 20000, 400, "image")
  jes = new component(1000, 600, "img/jesus.png", 20000, 20000, "image" )
  myGameArea.start();
}
setTimeout(() => {
  mel.x = powerX3
  mel.y = powerY3
}, 35000);
setTimeout(() => {
  djeni.x = powerX2
  djeni.y = powerY2
}, 25000);
setTimeout(() => {
  cura.x = powerX
  cura.y = powerY
}, 30000);
setTimeout(() => {
  calvo.x = randomX2
  calvo.y = randomY2
}, 20000);


myGameArea = {
  canvas: document.createElement("canvas"),
  start: function () {
    this.canvas.width = 990;
    this.canvas.height = 600;
    this.context = this.canvas.getContext("2d");
    document.body.insertBefore(this.canvas, document.body.childNodes[0]);
    this.frameNo = 0;
    this.interval = setInterval(updateGameArea, 20);
    window.addEventListener('keydown', function (e) {
      myGameArea.keys = (myGameArea.keys || []);
      myGameArea.keys[e.keyCode] = (e.type == "keydown");
    })
    window.addEventListener('keyup', function (e) {
      myGameArea.keys[e.keyCode] = (e.type == "keydown");
    })
  },
  clear: function () {
    this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
  },
  stop: function () {
    score = score
    clearInterval(this.interval);
  }


}


function everyinterval(n) {
  if ((myGameArea.frameNo / n) % 1 == 0) { return true; }
  return false;
}

function component(width, height, color, x, y, type) {
  setTimeout(() => {
    score += 1
  }, 200)
  this.type = type;
  if (type == "image") {
    this.image = new Image();
    this.image.src = color;
  }

  this.width = width;
  this.height = height;
  this.speedX = 0;
  this.speedY = 0;
  this.x = x;
  this.y = y;
  this.update = function () {
    ctx = myGameArea.context;
    if (type == "image") {
      ctx.drawImage(this.image,
        this.x,
        this.y,
        this.width, this.height);
    } else if (this.type == "text") {
      ctx.font = this.width + " " + this.height;
      ctx.fillStyle = color;
      ctx.fillText(this.text, this.x, this.y);
    } else {
      ctx.fillStyle = color;
      ctx.fillRect(this.x, this.y, this.width, this.height);
    }

  }

  this.newPos = function () {
    this.x += this.speedX;
    this.y += this.speedY;
    this.hitBottom();
    this.hitRight();
    this.hitLeft();
    this.hitTop();
  }
  this.hitBottom = function () {
    var rockbottom = myGameArea.canvas.height - this.height;
    if (this.y > rockbottom) {
      this.y = rockbottom;
    }
  }
  this.hitTop = function () {
    var rockTop = myGameArea.canvas.height - 600;
    if (this.y < rockTop) {
      this.y = rockTop;
    }
  }
  this.hitRight = function () {
    var rockRight = myGameArea.canvas.width - this.width;
    if (this.x > rockRight) {
      this.x = rockRight;
    }
  }
  this.hitLeft = function () {
    var rockLeft = myGameArea.canvas.width - 1000;
    if (this.x < rockLeft) {
      this.x = rockLeft;
    }
  }
  this.crashWith = function (otherobj) {
    var myleft = this.x;
    var myright = this.x + (myGamePiece.width - 20);
    var mytop = this.y;
    var mybottom = this.y + (myGamePiece.height - 10);
    var otherleft = otherobj.x;
    var otherright = otherobj.x + (otherobj.width);
    var othertop = otherobj.y;
    var otherbottom = otherobj.y + (otherobj.height);
    var crash = true;
    if ((mybottom < othertop) ||
      (mytop > otherbottom) ||
      (myright < otherleft) ||
      (myleft > otherright)) {
      crash = false;
    }
    return crash;
  }

}
function sound(src) {
  this.sound = document.createElement("audio");
  this.sound.src = src;
  this.sound.setAttribute("preload", "auto");
  this.sound.setAttribute("controls", "none");
  this.sound.style.display = "none";
  document.body.appendChild(this.sound);
  this.play = function () {
    this.sound.play();
  }
  this.stop = function () {
    this.sound.pause();
  }
}

function updateGameArea() {

  var x, y;
  let powerT = Math.floor(Math.random() * 50000);

  for (i = 0; i < myObstacles.length; i += 1) {
    if (vida <= 0) {
      window.location.href = "fim.php";

      var passaValor = function(valor)
      {
        window.location = "fim.php?minhaVariavel="+valor;
      }
    var score_final = score
    passaValor(score_final);
    
      myGameArea.stop();
    }
    if (myGamePiece.crashWith(myObstacles[i])) {
      myObstacles[i].y = 3000
      vida -= dano
      men1.y = 30
      setTimeout(() => {
        men1.y = 1000
      }, 1500);
      return
    }
    if (myGamePiece.crashWith(myEnemy)) {
      myGamePiece.x = 0
      myGamePiece.y = 280
      vida -= dano
      men1.y = 30
      setTimeout(() => {
        men1.y = 1000
      }, 1500);
      return;
    }
  
    if (myGamePiece.crashWith(mel)) { 
      melpro = true
      melmus.play()
      jes1 = true
      mel.x = 1000
      mel.y = 1000
      velo += 10
      veloc -= 10
      setTimeout(() => {
        melpro = false
        jes1 = false
        skin.x = 10000
        skin.y = 10000
        velo -= 10
        veloc += 10
      }, 10000)
    }
    
    if (melpro) {
      skin.x = myGamePiece.x
      skin.y = myGamePiece.y
    }

    if (myGamePiece.crashWith(caneca)) {
      velo += 0.5;
      veloc += -0.5;
      caneca.y = 20000
      setTimeout(() => {
        caneca.x = Math.floor(Math.random() * (myGameArea.canvas.width - 211));
        caneca.y = 10 + Math.floor(Math.random() * (myGameArea.canvas.height - 20));
      }, 5000)
      score += 10
      mai10.y = 30
      setTimeout(() => {
        mai10.y = 1000
      }, 1500);
    }
    if (myGamePiece.crashWith(cura)) {
      sirene.play()
      curacar.x = -340
      cura.y = 2000
      vida += 1
      mai1.y = 30
      setTimeout(() => {
        mai1.y = 1000
      }, 1500);
      setTimeout(() => {
        cura.x = Math.floor(Math.random() * (myGameArea.canvas.width - 211));
        cura.y = Math.floor(Math.random() * (myGameArea.canvas.height + 1));
      }, powerT)
    }
    if (myGamePiece.crashWith(powerdown)) {
      powerdown.x = 50000
      ladrao.x = 1100
      score -= 50
      men50.y = 30
      setTimeout(() => {
        men50.y = 1000
      }, 1500);
      corintia.play()
    }
    if (myGamePiece.crashWith(calvo)) {
      calvin=true
      calvomus.play()
      jes2 = true
      calvopro.x = 300
      setTimeout(() => {
        calvin=false
        jes2 = false
        calvopro.x -= 20000
      }, 10000);
    }
    if(calvin){
      calvopro.y = -60 + myGamePiece.y
      calvopro.x = +100 +myGamePiece.x
    }
    if (myObstacles[i].crashWith(calvopro)) {
      myObstacles[i].x = -1000
      score += 10
      mai10.y = 30
      setTimeout(() => {
        mai10.y = 1000
      }, 1500);
    }
    if (powerdown.crashWith(calvopro)) {
      powerdown.x = 50000
      score += 10
      mai10.y = 30
      setTimeout(() => {
        mai10.y = 1000
      }, 1500);
    }
    if (myGamePiece.crashWith(calvo)) {
      calvo.x = 2000
      setTimeout(() => {
        calvo.x = Math.floor(Math.random() * 761)
        calvo.y = Math.floor(Math.random() * 550)
      }, 20000);
    }
    if (myGamePiece.crashWith(djeni)) {
      jes3 = true
      myGamePiece.width = 40
      myGamePiece.height = 20
      skin.width = 40
      skin.height = 20
      setTimeout(() => {
        jes3 = false
        myGamePiece.width = 140
        myGamePiece.height = 80
        skin.width = 140
        skin.height = 80
      }, 10000);
      djeni.x = 1000
      setTimeout(() => {
        djeni.x = Math.floor(Math.random() * 761)
        djeni.y = Math.floor(Math.random() * 550)
      }, 25000);
    }
    if(jes1 && jes2 && jes3 == true){
      jes.x = 0
      jes.y = 0
      dano = 0
      calvin = false
      calvopro.y = 20000
      setTimeout(() => {
      jes1 = false
      jes2 = false
      jes3 = false
      jes.x = 20000
      jes.y = 20000
      dano = 1
    }, 10000) 
    }
  }

  ladrao.x -= 2
  curacar.x += 5
  setTimeout(() => {
    powerdown.x -= 20
  }, 10000)
  if (powerdown.x == -4000) {
    powerdown.x = 1100
    powerdown.y = Math.floor(Math.random() * 550)
  }
  myGameArea.clear();
  myGameArea.frameNo += 1;
  if (myGameArea.frameNo == 1 || everyinterval(50)) {
    x = myGameArea.canvas.width;
    minHeight = 0;
    maxHeight = 590;
    height = Math.floor(Math.random());
    minGap = 0;
    maxGap = 590;
    gap = Math.floor(Math.random() * (maxGap - minGap + 1) + minGap);
    myObstacles.push(new component(140, 40, "img/bolafog.png", x, height + gap, "image"));
  }
  speed = -10 - (3 * Math.floor(score / 100))
  for (i = 0; i < myObstacles.length; i += 1) {
    myObstacles[i].x += speed;
    myObstacles[i].update();
  }
  myGamePiece.speedX = 0;
  myGamePiece.speedY = 0;
  if (myGameArea.keys && myGameArea.keys[37]) { myGamePiece.speedX = veloc; }
  if (myGameArea.keys && myGameArea.keys[39]) { myGamePiece.speedX = velo; }
  // cima
  if (myGameArea.keys && myGameArea.keys[38]) { myGamePiece.speedY = veloc; }
  //baixo 
  if (myGameArea.keys && myGameArea.keys[40]) { myGamePiece.speedY = velo; }
  
  myScore.text = "SCORE: " + score;
  myScore.update();
  vidaimg.update();
  mel.update();
  jes.update();
  men50.update();
  mai10.update();
  mai1.update();
  men1.update();
  myVida.text = "x" + vida;
  myVida.update();
  myGamePiece.update();
  myGamePiece.newPos();  
  myObstacle.update();
  skin.update();
  djeni.update();
  calvo.update();
  calvopro.update();
  powerdown.update();
  myEnemy.update();
  ladrao.update();
  caneca.update();
  cura.update();
  curacar.update();
  powerT.update();
  powerX.update();
  powerY.update();
}

