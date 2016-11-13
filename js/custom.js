jQuery(document).ready(function($) {

    $('#sair').click(function(event) {
        $("#mensagem p").text("Deseja sair?");
        $("#mensagem small").text("Clique em Sair para fazer logout.");
        $("#mensagem").dialog({
            show: { effect: 'fade', speed: '1500' },
            hide: { effect: 'fade', speed: '1000' },
            buttons: {
                Sair: function() {
                    $.get("../controller/login.php?logout=true",
                        function(data) {
                            data = JSON.parse(data)
                            console.log(data);
                            if (data == true) {
                                sessionStorage.setItem("logado", 0);
                                window.location.assign("../index.php");
                            }

                        }
                    );
                },
                Cancelar: function() {
                    $(this).dialog("close");
                }
            }
        });
    });

    $('#form-login .submit').click(function(event) {
        event.preventDefault();
        var loginUsuario = $('#login').val();
        var senhaUsuario = $('#password').val();
        if (loginUsuario == "" || senhaUsuario == "") {
            $("#mensagem p").text("Preencha os campos!");
            $("#mensagem small").text("Insira seu login e senha.");
            $("#mensagem").dialog({
                show: { effect: 'fade', speed: '1500' },
                hide: { effect: 'fade', speed: '1000' },
                OK: function() {
                    $(this).dialog("close");
                }
            });
        } else {
            $.post("controller/login.php", { login: loginUsuario, password: senhaUsuario },
                function(data) {
                    data = JSON.parse(data);
                    if (data)
                        window.location.assign("tmp/");
                    else {
                        $("#mensagem p").text("Usuário não encontrado!");
                        $("#mensagem small").text("Verifique as informações.");
                        $("#mensagem").dialog({
                            show: { effect: 'fade', speed: '1500' },
                            hide: { effect: 'fade', speed: '1000' },
                            OK: function() {
                                $('input[name="valor"]').focus();
                                $(this).dialog("close");
                            }
                        });
                        $('#login').val("");
                        $('#password').val("");
                    }
                });
        }
    });

});