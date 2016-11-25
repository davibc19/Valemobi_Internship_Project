<?php

include '../../functions/conexaoBd.php';

/* ----------------------------------------------------------------------
 *                    FUNÇÕES DE CREATE
 * ---------------------------------------------------------------------- */

function cadastrarUsuario($tipo, $cpf, $nome, $senha, $dataNasc)
{
    $res = "INSERT INTO usuarios (tipo, cpf, nome, senha, dataNasc)"
            . " VALUES ('$tipo', '$cpf', '$nome', '$senha', '$dataNasc')";

    if (mysql_query($res))
    {
        echo "<script> alert('Usuário cadastrado com sucesso!'); "
        . "window.location='../index/login_index.php';</script>";
    } else
    {
        echo "<script> alert('Erro no cadastro do usuario!');"
        . " window.location='cadastrarUsuario.php';</script>";
    }
}

function cadastrarDisciplina($codigo, $nome)
{
    $res = "INSERT INTO disciplinas (codigo, nome) VALUES ('$codigo', '$nome')";

    if (mysql_query($res))
    {
        echo "<script> alert('Disciplina cadastrada com sucesso!'); "
        . "window.location='../index/indexAdmin.php';</script>";
    } else
    {
        echo "<script> alert('Erro no cadastro da disciplina!!');"
        . " window.location='cadastrarUsuario.php';</script>";
    }
}

function cadastrarTurma($idDisciplina, $idProfessor)
{
    $res = "INSERT INTO turmas (idDisciplina, idProfessor, qtdAlunos) VALUES"
            . "('$idDisciplina', '$idProfessor', '0')";

    if (mysql_query($res))
    {
        echo "<script> alert('Disciplina cadastrada com sucesso!'); "
        . "window.location='../index/indexAdmin.php';</script>";
    } else
    {
        echo "<script> alert('Erro no cadastro da disciplina!!');"
        . " window.location='cadastrarTurma.php?idDisciplina=" . $idDisciplina . "';</script>";
    }
}

function cadastrarAvaliacao($idDisciplina, $idTurma)
{
    $res = "INSERT INTO avaliacoes (idDisciplina, idTurma, qtdQuestoes, status) VALUES"
            . "('$idDisciplina', '$idTurma', '0', 'ativo')";

    if (mysql_query($res))
    {
        echo "<script> alert('Avaliação cadastrada com sucesso!'); "
        . " window.location='../avaliacao/infoAvaliacao.php?id=" . $idTurma . "';</script>";
    } else
    {
        echo "<script> alert('Erro no cadastro da avaliação!!');"
        . " window.location='../avaliacao/infoAvaliacao.php?id=" . $idTurma . "';</script>";
    }
}

function cadastrarQuestao($idAvaliacao, $enunciado, $a, $b, $c, $d, $resposta)
{
    $dadosAvaliacao = mysql_fetch_array(consultarAvaliacoesPorId($idAvaliacao));

    $qtdQuestoes = $dadosAvaliacao['qtdQuestoes'] + 1;

    $res = "INSERT INTO questoes (idAvaliacao, enunciado, a, b, c, d, resposta) VALUES"
            . "('$idAvaliacao', '$enunciado', '$a', '$b', '$c', '$d', '$resposta')";

    $resUpdate = "UPDATE avaliacoes SET qtdQuestoes = '" . $qtdQuestoes . "' WHERE id = '" . $dadosAvaliacao['id'] . "'";

    if (mysql_query($res) && mysql_query($resUpdate))
    {
        echo "<script> alert('Questão cadastrada com sucesso!'); "
        . " window.location='../questao/infoQuestao.php?id=" . $idAvaliacao . "&idTurma=" . $dadosAvaliacao['idTurma'] . "';</script>";
    } else
    {
        echo "<script> alert('Erro no cadastro da questão!!');"
        . " window.location='../questao/infoQuestao.php?id=" . $idAvaliacao . "&idTurma=" . $dadosAvaliacao['idTurma'] . "';</script>";
    }
}

function matricularAluno($idAluno, $idDisciplina, $idTurma, $matriculados)
{
    $res = "INSERT INTO alunos_turmas (idAluno, idDisciplina, idTurma) VALUES "
            . "('$idAluno', '$idDisciplina', '$idTurma')";

    $matriculados = $matriculados + 1;

    $resUpdate = "UPDATE turmas SET qtdAlunos = '$matriculados' WHERE id = '$idTurma'";

    if (mysql_query($res) && mysql_query($resUpdate))
    {
        echo "<script> alert('Aluno matriculado com sucesso!'); "
        . " window.location='cadastrarAluno.php?id=" . $idTurma . "';</script>";
    } else
    {
        echo "<script> alert('Erro na matrícula deste aluno!!');"
        . " window.location='cadastrarAluno.php?id=" . $idTurma . "';</script>";
    }
}

/* ----------------------------------------------------------------------
 *                    FUNÇÕES DE READ
 * ---------------------------------------------------------------------- */

function consultarDisciplinas()
{
    RETURN mysql_query("SELECT * FROM disciplinas");
}

function consultarDisciplinaPorId($id)
{
    RETURN mysql_query("SELECT * FROM disciplinas WHERE id = '$id'");
}

function consultarTurmas()
{
    RETURN mysql_query("SELECT * FROM turmas");
}

function consultarTurmaPorDisciplina($idDisciplina)
{
    RETURN mysql_query("SELECT * FROM turmas WHERE idDisciplina = '$idDisciplina'");
}

function consultarTurmaPorId($id)
{
    RETURN mysql_query("SELECT * FROM turmas WHERE id = '$id'");
}

function consultarTurmasPorProfessor($cpf)
{
    $dadosProfessor = mysql_fetch_array(consultarUsuariosPorCpf($cpf));
    RETURN mysql_query("SELECT * FROM turmas WHERE idProfessor = '" . $dadosProfessor['id'] . "'");
}

function consultarUsuarios($tipo)
{
    RETURN mysql_query("SELECT * FROM usuarios WHERE tipo = '$tipo'");
}

function consultarUsuariosPorCpf($cpf)
{
    RETURN mysql_query("SELECT * FROM usuarios WHERE cpf = '$cpf'");
}

function consultarUsuarioEmTurma($idAluno, $idDisciplina)
{
    RETURN mysql_query("SELECT * FROM alunos_turmas WHERE idAluno = '$idAluno' AND idDisciplina='$idDisciplina'");
}

function consultarAlunosDeTurma()
{
    RETURN mysql_query("SELECT user.cpf, user.nome, disc.codigo, disc.nome, t.id FROM usuarios AS user JOIN alunos_turmas AS at ON user.id = at.idAluno"
            . " JOIN turmas AS t ON t.id = at.idTurma JOIN disciplinas AS disc ON disc.id = t.idDisciplina");
}

function consultarProfessoresDeTurma()
{
    RETURN mysql_query("SELECT user.cpf, user.nome, disc.codigo, disc.nome, t.id FROM usuarios AS user "
            . "JOIN turmas AS t ON t.idProfessor = user.id JOIN disciplinas AS disc ON t.idDisciplina = disc.id");
}

function consultarAvaliacoesPorTurma($idTurma)
{
    RETURN mysql_query("SELECT * FROM avaliacoes WHERE idTurma = '$idTurma'");
}

function consultarQuestoesPorAvaliacao($idAvaliacao)
{
    RETURN mysql_query("SELECT * FROM questoes WHERE idAvaliacao = '$idAvaliacao'");
}

function consultarQuestaoPorId($idQuestao)
{
    RETURN mysql_query("SELECT * FROM questoes WHERE id = '$idQuestao'");
}

function consultarAvaliacoesPorId($id)
{
    RETURN mysql_query("SELECT * FROM avaliacoes WHERE id = '$id'");
}

/* ----------------------------------------------------------------------
 *                    FUNÇÕES DE UPDATE
 * ---------------------------------------------------------------------- */

function alterarDisciplina($id, $codigo, $nome)
{
    $res = "UPDATE disciplinas SET codigo = '" . $codigo . "', nome = '" . $nome . "' WHERE id = '" . $id . "'";

    if (mysql_query($res))
    {
        echo "<script> alert('Disciplina alterada com sucesso!'); "
        . "window.location='../index/indexAdmin.php';</script>";
    } else
    {
        echo "<script> alert('Erro na atualização da disciplina!!');"
        . " window.location='alterarUsuario.php';</script>";
    }
}

function alterarQuestao($id, $idAvaliacao, $enunciado, $a, $b, $c, $d, $resposta)
{
    $dadosAvaliacao = mysql_fetch_array(consultarAvaliacoesPorId($idAvaliacao));
    
    $res = "UPDATE questoes SET enunciado = '" . $enunciado . "', a = '" . $a . "', b = '".$b."', "
            . "c = '".$c."', d = '".$d."', resposta = '".$resposta."' WHERE id = '" . $id . "'";

   if (mysql_query($res))
    {
        echo "<script> alert('Questão atualizada com sucesso!'); "
        . " window.location='../questao/infoQuestao.php?id=" . $idAvaliacao . "&idTurma=" . $dadosAvaliacao['idTurma'] . "';</script>";
    } else
    {
        echo "<script> alert('Erro na atualização da questão!!');"
        . " window.location='../questao/infoQuestao.php?idQuestao=" . $id . "&idAvaliacao=" . $idAvaliacao . "';</script>";
    }
}

/* ----------------------------------------------------------------------
 *                    FUNÇÕES DE DELETE
 * ---------------------------------------------------------------------- */

function deletarDisciplina($id)
{
    $res = "DELETE FROM disciplinas WHERE id = '$id'";
    if (mysql_query($res))
    {
        echo "<script> alert('Disciplina excluída com sucesso!'); "
        . "window.location='../index/indexAdmin.php';</script>";
    } else
    {
        echo "<script> alert('Erro na exclusão da disciplina!!');"
        . " window.location='../index/indexAdmin.php';</script>";
    }
}

function deletarTurma($id)
{
    $res = "DELETE FROM turmas WHERE id = '$id'";
    if (mysql_query($res))
    {
        echo "<script> alert('Turma excluída com sucesso!'); "
        . "window.location='../index/indexAdmin.php';</script>";
    } else
    {
        echo "<script> alert('Erro na exclusão da turma!!');"
        . " window.location='../index/indexAdmin.php';</script>";
    }
}

function deletarAvaliacao($id, $idTurma)
{
    $res = "DELETE FROM avaliacoes WHERE id = '$id'";
    if (mysql_query($res))
    {
        echo "<script> alert('Avaliação excluída com sucesso!'); "
        . "window.location='infoAvaliacao.php?id=" . $idTurma . "';</script>";
    } else
    {
        echo "<script> alert('Erro na exclusão da avaliação!!');"
        . "window.location='infoAvaliacao.php?id=" . $idTurma . "';</script>";
    }
}

function deletarQuestao($id, $idAvaliacao)
{
    $dadosAvaliacao = mysql_fetch_array(consultarAvaliacoesPorId($idAvaliacao));

    $qtdQuestoes = $dadosAvaliacao['qtdQuestoes'] - 1;

    $res = "DELETE FROM questoes WHERE id = '$id'";
    $resUpdate = "UPDATE avaliacoes SET qtdQuestoes = '" . $qtdQuestoes . "' WHERE id = '" . $dadosAvaliacao['id'] . "'";

    if (mysql_query($res) && mysql_query($resUpdate))
    {
        echo "<script> alert('Questão excluída com sucesso!'); "
        . "window.location='infoQuestao.php?id=" . $idAvaliacao . "&idTurma=" . $dadosAvaliacao['idTurma'] . "';</script>";
    } else
    {
        echo "<script> alert('Erro na exclusão da questão!!');"
        . "window.location='infoQuestao.php?id=" . $idAvaliacao . "&idTurma=" . $dadosAvaliacao['idTurma'] . "';</script>";
    }
}

function desmatricularAluno($idAluno, $idDisciplina, $idTurma, $matriculados)
{
    $res = "DELETE FROM alunos_turmas WHERE idAluno = '$idAluno' AND idTurma = '$idTurma'";

    $matriculados = $matriculados - 1;

    $resUpdate = "UPDATE turmas SET qtdAlunos = '$matriculados' WHERE id = '$idTurma'";

    if (mysql_query($res) && mysql_query($resUpdate))
    {
        echo "<script> alert('Aluno desmatriculado com sucesso!'); "
        . " window.location='cadastrarAluno.php?id=" . $idTurma . "';</script>";
    } else
    {
        echo "<script> alert('Erro na desmatrícula deste aluno!!');"
        . " window.location='cadastrarAluno.php?id=" . $idTurma . "';</script>";
    }
}

?>
