    /*
     * Chega nivel de segurança da Senha
     */

    function checar_preenchimento( campo, bBotEnviar ) {
        var campoVerificado     = document.getElementById( campo ).value;              
        var lRet      = false;

        // Verifica se o tamanho da senha é menor que 7 caracteres

        if ( campoVerificado.length >= 1 ) {
            lRet = true;
        } else {
            lRet = false;
        }

        if ( lRet ) {
            document.getElementById( bBotEnviar ).disabled  = 0; // Habilita botão enviar
        } else {
            document.getElementById( campo ).focus = true;
            document.getElementById( bBotEnviar ).disabled  = 1; // Desabilita botão enviar
        }

        return lRet;
    }