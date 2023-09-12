/*
 * printThis v1.10.0
 * @desc Plug-in de impressão para jQuery
 * @autor Jason Day
 *
 * Recursos (baseados em):
 * jPrintArea: http://plugins.jquery.com/project/jPrintArea
 * jqPrint: https://github.com/permanenttourist/jquery.jqprint
 * Ben Nadal: http://www.bennadel.com/blog/1591-Ask-Ben-Print-Part-Of-A-Web-Page-With-jQuery.htm
 *
 * Licenciado sob a licença MIT:
 * http://www.opensource.org/licenses/mit-license.php
 *
 * (c) Dia de Jason 2015
 *
 * Uso:
 *
 * $("#meuSeletor").printThis({
 * debug: false, // mostra o iframe para depuração
 * importCSS: true, // importa o CSS da página
 * importStyle: false, // importa tags de estilo
 * printContainer: true, // pega o container externo assim como o conteúdo do seletor
 * loadCSS: "path/to/my.css", // caminho para arquivo css adicional - use um array [] para múltiplos
 * pageTitle: "", // adiciona título à página de impressão
 * removeInline: false, // remove todos os estilos inline dos elementos de impressão
 * printDelay: 333, // atraso de impressão variável
 * cabeçalho: nulo, // prefixo para html
 * rodapé: null, // postfix para html
 * base: false, // preserva a tag BASE ou aceita uma string para a URL
 * formValues: true, // preserva valores de entrada/formulário
 * canvas: false, // copia os elementos da tela (experimental)
 * doctypeString: '...', // insira um doctype diferente para marcação mais antiga
 * removeScripts: false // remove tags de script do conteúdo de impressão
 * });
 *
 * Notas:
 * - o loadCSS carregará CSS adicional (com ou sem @media print) no iframe, ajustando o layout
 */
;
(função($){

    função appendContent($el, conteúdo) {
        if (!content) retornar;

        // Teste simples para um elemento jQuery
        $el.append(content.jquery ? content.clone() : conteúdo);
    }

    function appendBody($body, $element, opt) {
        // Clone para segurança e conveniência
        var $conteúdo = $elemento.clone();

        if (opt.removeScripts) {
            $content.find('script').remove();
        }

        if (opt.printContainer) {
            // pega $.selector como container
            $body.append($("<div/>").html($content).html());
        } outro {
            // caso contrário, apenas imprima os elementos internos do contêiner
            $content.each(função() {
                $body.append($(this).html());
            });
        }
		}

    var opt;
    $.fn.printThis = function(opções) {
        opt = $.extend({}, $.fn.printThis.defaults, opções);
        var $element = esta instância de jQuery? isto: $(este);

        var strFrameName = "printThis-" + (new Date()).getTime();

        if (window.location.hostname !== document.domain && navigator.userAgent.match(/msie/i)) {
            // IE feio hacks devido ao IE não herdar document.domain do pai
            // verifica se document.domain está configurado comparando o nome do host com document.domain
            var iframeSrc = "javascript:document.write(\"<head><script>document.domain=\\\"" + document.domain + "\\\";</s" + "cript></head> <body></body>\")";
            var printI = document.createElement('iframe');
            printI.name = "printIframe";
            printI.id = strFrameName;
            printI.className = "MSIE";
            document.body.appendChild(printI);
            printI.src = iframeSrc;

        } outro {
            // outros navegadores herdam document.domain, e o IE funciona se document.domain não estiver definido explicitamente
            var $frame = $("<iframe id='" + strFrameName + "' name='printIframe' />");
            $frame.appendTo("corpo");
        }

        var $iframe = $("#" + strFrameName);

        // mostra o quadro se estiver no modo de depuração
        if (!opt.debug) $iframe.css({
            posição: "absoluto",
            largura: "0px",
            altura: "0px",
            esquerda: "-600px",
            topo: "-600px"
        });

        // $iframe.ready() e $iframe.load eram inconsistentes entre os navegadores    
        setTimeout(função(){

            //Adiciona doctype para corrigir a diferença de estilo entre impressão e renderização
            function setDocType($iframe, doctype){
                var win, doc;
                ganhar = $iframe.get(0);
                win = win.contentWindow || win.contentDocumento || ganhar;
                doc = win.document || win.contentDocumento || ganhar;
                doc.open();
                doc.write(doctype);
                doc.close();
            }

            if (opt.doctypeString){
                setDocType($iframe, opt.doctypeString);
            }

            var $doc = $iframe.contents(),
                $cabeça = $doc.find("cabeça"),
                $corpo = $doc.find("corpo"),
                $base = $('base'),
                baseURL;

            // adiciona tag base para garantir que os elementos usem o domínio pai
            if (opt.base === true && $base.length > 0) {
                // pega a tag base da página original
                baseURL = $base.attr('href');
            } else if (typeof opt.base === 'string') {
                // Uma string base exata é fornecida
                baseURL = opt.base;
            } outro {
                // Use a URL da página como base
                baseURL = document.location.protocol + '//' + document.location.host;
            }

            $head.append('<base href="' + baseURL + '">');

            // importa folhas de estilo da página
            if (opt.importCSS) $("link[rel=stylesheet]").each(function() {
                var href = $(this).attr("href");
                se (href) {
                    var mídia = $(this).attr("mídia") || "todos";
                    $head.append("<link type='text/css' rel='stylesheet' href='" + href + "'media='" + media + "'>");
                }
            });
            
            //importa tags de estilo
            if (opt.importStyle) $("estilo").each(function() {
                $(this).clone().appendTo($head);
            });

            //adiciona o título da página
            if (opt.pageTitle) $head.append("<title>" + opt.pageTitle + "</title>");

            // importa folha(s) de estilo adicional(is)
            if (opt.loadCSS) {
               if ($.isArray(opt.loadCSS)) {
                    jQuery.each(opt.loadCSS, function(índice, valor) {
                       $head.append("<link type='text/css' rel='stylesheet' href='" + this + "'>");
                    });
                } outro {
                    $head.append("<link type='text/css' rel='stylesheet' href='" + opt.loadCSS + "'>");
                }
            }

            // imprimir cabeçalho
            acrescentarConteúdo($body, opt.header);

            if (opt.canvas) {
                // adiciona IDs de dados de tela para facilitar o acesso após a clonagem.
                var canvasId = 0;
                $element.find('canvas').each(function(){
                    $(this).attr('data-printthis', canvasId++);
                });
            }

            anexarBody($corpo, $elemento, opt);

            if (opt.canvas) {
                // Redesenhe novas telas referenciando as originais
                $body.find('canvas').each(function(){
                    var cid = $(this).data('printthis'),
                        $src = $('[data-printthis="' + cid + '"]');

                    this.getContext('2d').drawImage($src[0], 0, 0);

                    //Remove a marcação do original
                    $src.removeData('printthis');
                });
            }

            // captura valores de formulário/campo
            if (opt.formValues) {
                // faz um loop pelas entradas
                var $entrada = $element.find('entrada');
                if ($input.comprimento) {
                    $input.each(função() {
                        var $isto = $(isto),
                            $nome = $(este).attr('nome'),
                            $verificador = $this.is(':caixa de seleção') || $this.is(':rádio'),
                            $iframeInput = $doc.find('input[nome="' + $nome + '"]'),
                            $valor = $este.val();

                        // encomende assuntos aqui
                        if (!$verificador) {
                            $iframeInput.val($valor);
                        } else if ($this.is(':checked')) {
                            if ($this.is(':checkbox')) {
                                $iframeInput.attr('marcado', 'verificado');
                            } else if ($this.is(':radio')) {
                                $doc.find('input[name="' + $name + '"][value="' + $value + '"]').attr('checked', 'checked');
                            }
                        }

                    });
                }

                //percorre as seleções
                var $select = $element.find('select');
                if ($select.comprimento) {
                    $select.each(função() {
                        var $isto = $(isto),
                            $nome = $(este).attr('nome'),
                            $valor = $este.val();
                        $doc.find('select[name="' + $name + '"]').val($value);
                    });
                }

                // faz um loop pelas áreas de texto
                var $textarea = $element.find('textarea');
                if ($textarea.length) {
                    $textarea.each(function() {
                        var $isto = $(isto),
                            $nome = $(este).attr('nome'),
                            $valor = $este.val();
                        $doc.find('textarea[name="' + $name + '"]').val($value);
                    });
                }
            } // fim da captura de valores de formulário/campo

            //remove estilos embutidos
            if (opt.removeInline) {
                // $.removeAttr disponível jQuery 1.7+
                if ($.isFunction($.removeAttr)) {
                    $doc.find("corpo *").removeAttr("estilo");
                } outro {
                    $doc.find("corpo *").attr("estilo", "");
                }
            }

            // imprime "rodapé"
            appendContent($body, opt.footer);

            setTimeout(função(){
                if ($iframe.hasClass("MSIE")) {
                    // verifica se o iframe foi criado com o hack feio
                    // e executa outro hack feio por necessidade
                    window.frames["printIframe"].focus();
                    $head.append("<script> window.print(); </s" + "cript>");
                } outro {
                    //método adequado
                    if (document.queryCommandSupported("print")) {
                        $iframe[0].contentWindow.document.execCommand("print", false, null);
                    } outro {
                        $iframe[0].contentWindow.focus();
                        $iframe[0].contentWindow.print();
                    }
                }

                //remove o iframe após a impressão
                if (!opt.debug) {
                    setTimeout(função(){
                        $iframe.remove();
                    }, 1000);
                }

            }, opt.printDelay);

        }, 333);

    };

    // padrões
    $.fn.printThis.defaults = {
        debug: false, // mostra o iframe para depuração
        importCSS: true, // importa o css da página pai
        importStyle: false, // importa tags de estilo
        printContainer: true, // imprime o contêiner externo/$.selector
        loadCSS: "", // carrega um arquivo css adicional - carrega várias folhas de estilo com um array []
        pageTitle: "", // adiciona título à página impressa
        removeInline: false, // remove todos os estilos embutidos
        printDelay: 333, // atraso de impressão variável
        cabeçalho: null, // prefixo para html
        rodapé: null, // postfix para html
        formValues: true, // preserva os valores de entrada/formulário
        canvas: false, // copia o conteúdo da tela (experimental)
        base: false, // preserva a tag BASE ou aceita uma string para o URL
        doctypeString: '<!DOCTYPE html>', // doctype html
        removeScripts: false // remove tags de script antes de anexar
    };
})(jQuery);