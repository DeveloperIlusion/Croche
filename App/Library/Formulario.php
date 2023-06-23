<?php

namespace App\Library;

use App\Library\Formulario as LibraryFormulario;

class Formulario
{
    static public function titulo($titulo, $btNew = true, $btVoltar = false) 
    {
        $service = new Service();
        $html = '';

        if ($service->getAcao() == 'insert') {
            $titulo .= " - Inclusão";
        } elseif ($service->getAcao() == 'update') {
            $titulo .= " - Alteração";
        } elseif ($service->getAcao() == 'delete') {
            $titulo .= " - Exclusão";
        } elseif ($service->getAcao() == 'view') {
            $titulo .= " - Visualização";
        }

        $html = '<h2 class="title-contact">' . $titulo . '</h2>';

        if ($btNew) {
            $html .= Formulario::botao('insert');
        }

        if ($btVoltar) {
            $html .= '<p>'. Formulario::botao('voltar') . '</p>';
        }

        $html .= Formulario::mensagem();

        return $html;
    }

    /**
     * botao
     *
     * @param string $tipo 
     * @param mixed $id 
     * @return string
     */
    static public function botao($tipo, $id = null)
    {
        $service = new Service();

        $html = "";
        $url = baseUrl() . $service->getController();

        if ($tipo == 'insert') {
            $html = '
                    <p>
                        <a href="' . $url . '/form/insert/0" title="Inclusão" class="btn btn-outline-danger mb-5"><i class="fa fa-plus" area-hidden="true"></i></a>
                    </p>';
        } elseif ($tipo == 'update') {
            $html = '<a href="' . $url . '/form/update/' . $id . '" title="Alteração" class="btn btn-outline-danger"><i class="fa fa-file" area-hidden="true"></i></a>&nbsp;&nbsp;';
        } elseif ($tipo == 'delete') {
            $html = '<a href="' . $url . '/form/delete/' . $id . '" title="Exclusão" class="btn btn-outline-danger"><i class="fa fa-trash" area-hidden="true"></i></a>&nbsp;&nbsp;';
        } elseif ($tipo == 'view') {
            $html = '<a href="' . $url . '/form/view/' . $id . '" title="Visualização" class="btn btn-outline-danger"><i class="fa fa-eye" area-hidden="true"></i></a>&nbsp;&nbsp;';
        } elseif ($tipo == 'voltar') {
            $html = '<a href="' . $url . '" class="btn btn-outline-secondary" title="Voltar">Voltar</a>';
        }

        return $html;
    }

    /**
     * exibeMsgSucesso
     *
     * @return string
     */
    static public function exibeMsgSucesso()
    {
        $html = "";

        if (Session::get("msgSuccess") != false) {
            $html .= '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        ' . Session::getDestroy("msgSuccess") . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                    </div>';
        }

        return $html;
    }

    /**
     * exibeMsgError
     *
     * @return string
     */
    static public function exibeMsgError()
    {
        $html = "";

        if (Session::get("msgError") != false) {
            $html .= '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        ' . Session::getDestroy("msgError") . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                    </div>';
        }

        return $html;
    }

    /**
     * mensagem
     *
     * @return string
     */
    static public function mensagem()
    {
        $html = "";

        $html .= Formulario::exibeMsgSucesso();
        $html .= Formulario::exibeMsgError();

        if (Session::get("errors") != false) {
            
            $aErrors = Session::getDestroy('errors');
            $textoErros = "";

            foreach ($aErrors AS $value) {
                $textoErros .= ($textoErros != "" ? "<br />" : "") . $value;
            }

            $html .= '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            ' . $textoErros . '
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                        </div>';
        }

        return $html;
    }

    /**
     * getDataTables
     *
     * @param string $table_id 
     * @return string
     */
    static public function getDataTables($table_id)
    {
        return '
            <script type="text/javascript" src="' . baseUrl() . 'assets/datatables/datatables.min.js"></script>
            <script>
                $(document).ready( function() {
                    $("#' . $table_id . '").DataTable( {
                        language:   {
                                        "sEmptyTable":      "Nenhum registro encontrado",
                                        "sInfo":            "Exibindo do _START_ ao _END_ | No total há _TOTAL_ registros",
                                        "sInfoEmpty":       "Nenhum registro encontrado.",
                                        "sInfoFiltered":    "(Filtrados de _MAX_ registros)",
                                        "sInfoPostFix":     "",
                                        "sInfoThousands":   ".",
                                        "sLengthMenu":      "_MENU_ resultados por página",
                                        "sLoadingRecords":  "Carregando...",
                                        "sProcessing":      "Processando...",
                                        "sZeroRecords":     "Nenhum registro encontrado",
                                        "sSearch":          "Pesquisar",
                                        "oPaginate": {
                                            "sNext":        "Próximo",
                                            "sPrevious":    "Anterior",
                                            "sFirst":       "Primeiro",
                                            "sLast":        "Último"
                                        },
                                        "oAria": {
                                            "sSortAscending":   ": Ordenar colunas de forma ascendente",
                                            "sSortDescending":  ": Ordenar colunas de forma descendente"
                                        }
                                    }
                    });
                } );
            </script>
        ';
    }
}