<?php

class Pokemon {

    public $nome;
    public $experiencia;
    public $pontosVida;
    public $nivel = 1;

    function batalhar() {

        $batalhas = readline("Quantas vezes você gostaria de batalhar? ");
        $luta = $this->pontosVida;

        for ($i = 0; $i < $batalhas; $i++) {
            $luta -= random_int(1, 20);
        }

        if ($luta <= 0) {
            print("O seu pokémon perdeu! Que pena!\n");
            return 0;
        } else {
            print("O seu pokémon venceu! Que alegria!\n");
            print("Seu pokémon tem " . $luta . " pontos de vida atualmente. \n");
            return $luta;
        }
    }

    function aumentarExperiencia() {

        $resultado = $this->batalhar();

        if ($resultado == 0) {
            return 0;
        }else{

            print("A experiencia atual do seu pokémon é " . $this->experiencia . "\n");

            if ($resultado >= $this->experiencia) {
                $experienciaNova = $this->experiencia += 10;
                print("A experiência do pokémon aumentou! Agora é: " . $experienciaNova . "\n");
                return $experienciaNova;
            } else {
                print("Continue batalhando para aumentar a experiência!\n");

                $continuar = readline("Gostaria de continuar batalhando? s = sim | n = não: ");

                if ($continuar == "s") {
                    $resultado += 10;
                    $this->batalhar();
                } else {
                    print("Que pena! Até a próxima batalha.\n");
                }

                return $this->experiencia;
            }

        }
    }

    function aumentarNivel() {

            print("O nível atual do seu pokémon é: " . $this->nivel . "\n");

            if ($this->aumentarExperiencia() >= $this->experiencia) {
                $nivelNovo = $this->nivel++;
                print("O nível do seu pokémon aumentou para: " . $nivelNovo);
                return $nivelNovo;

            } else {
                print("Continue batalhando para aumentar o nível do seu pokémon!\n");
                return $this->nivel;
            }

            

    }

    function aumentarVida() {

        print("Os pontos de vida atuais são: " . $this->pontosVida);

        if ($this->aumentarNivel() >= 2) {
            $pontosVidaNovo = $this->pontosVida += 10;
            print("Os pontos de vida aumentaram! Agora são: " . $this->pontosVida . "\n");
            return $pontosVidaNovo;

        } else {
            print("Continue subindo de nível para aumentar os pontos de vida!\n");
            return $this->pontosVida;
        }

    }
}

$pokemon = new Pokemon();

$pokemon->nome = readline("Informe o nome do seu pokémon: ");
$pokemon->experiencia = (int) readline("Informe a experiência do seu pokémon: ");
$pokemon->pontosVida = (int) readline("Informe os pontos de vida do seu pokémon: ");

$pokemon->aumentarExperiencia();
$pokemon->aumentarNivel();
$pokemon->aumentarVida();
