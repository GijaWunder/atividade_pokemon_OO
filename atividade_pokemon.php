<?php

class Pokemon {

    public $nome;
    public $experiencia;
    public $pontosVida;
    public $nivel;

    function batalhar() {

        $batalhas = (int) readline("Quantas vezes você gostaria de batalhar? ");

             if ($batalhas <= 0) {
                while ($batalhas <= 0) {
                $batalhas = (int) readline("A quantidade de batalhas deve ser maior que 0. Informe novamente: ");
                }
            }

        $luta = $this->pontosVida;

        for ($i = 0; $i < $batalhas; $i++) {
            $luta -= random_int(1, 20);
        }

        if ($luta <= 0) {
            print("O(A) " . $this->nome . " perdeu! Que pena!\n");
            return 0;
        } else {
            print("O(A) " . $this->nome . " venceu! Que alegria!\n");
            print("Seu pokémon tem " . $luta . " pontos de vida atualmente. \n");
            return $luta;
        }
    }

    function aumentarExperiencia($resultado) {

            if ($resultado >= $this->experiencia) {
                $novaExperiencia = $this->experiencia += 10;
                print("A experiência do(a) " . $this->nome . " aumentou! Agora é: " . $novaExperiencia . "\n");
            }
            return $novaExperiencia;

    }

    function aumentarNivel($resultado) {

            if ($resultado >= $this->experiencia) {
                $novoNivel = $this->nivel + 1;
                print("O nível do(a) " . $this->nome . " aumentou para: " . $novoNivel . "\n");
                return $novoNivel;
            }
    }

    function aumentarVida($resultado) {

        if ($resultado >= $this->experiencia) {
            $resultado += 10;
            print("Os pontos de vida aumentaram! Agora são: " . $resultado . "\n");
        }
        return $resultado;

    }
}

$pokemon = new Pokemon();

$pokemon->nome = readline("Informe o nome do seu pokémon: ");
$pokemon->experiencia = (int) readline("Informe a experiência do seu pokémon: ");
    if ($pokemon->experiencia <= 0) {
        while ($pokemon->experiencia <= 0) {
        $pokemon->experiencia = (int) readline("A experiência deve ser maior que 0. Informe novamente: ");
        }
    }
$pokemon->pontosVida = (int) readline("Informe os pontos de vida do seu pokémon: ");
    if ($pokemon->pontosVida <= 0) {
        while ($pokemon->pontosVida <= 0) {
        $pokemon->pontosVida = (int) readline("Os pontos de vida devem ser maior que 0. Informe novamente: ");
        }
    }

$pokemon->nivel = (int) readline("Informe o nível do seu pokémon: ");
    if ($pokemon->nivel <= 0) {
        while ($pokemon->nivel <= 0) {
        $pokemon->nivel = (int) readline("O nível deve ser maior que 0. Informe novamente: ");
        }
    }

$resultado = $pokemon->batalhar();

if ($resultado > 0) {
    $pokemon->aumentarExperiencia($resultado);
    $pokemon->aumentarNivel($resultado);
    $pokemon->aumentarVida($resultado);
}
