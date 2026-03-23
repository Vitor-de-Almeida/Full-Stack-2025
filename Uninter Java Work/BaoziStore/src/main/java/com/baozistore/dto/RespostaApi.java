package com.baozistore.dto;

import com.fasterxml.jackson.annotation.JsonInclude;

/**
 * Resposta JSON padronizada: mensagem humana + payload opcional em {@code dados}.
 */
@JsonInclude(JsonInclude.Include.NON_NULL)
public class RespostaApi<T> {

    private String mensagem;
    private T dados;

    public RespostaApi() {}

    public RespostaApi(String mensagem, T dados) {
        this.mensagem = mensagem;
        this.dados = dados;
    }

    public static <T> RespostaApi<T> of(String mensagem, T dados) {
        return new RespostaApi<>(mensagem, dados);
    }

    public static RespostaApi<Void> mensagem(String mensagem) {
        return new RespostaApi<>(mensagem, null);
    }

    public String getMensagem() {
        return mensagem;
    }

    public void setMensagem(String mensagem) {
        this.mensagem = mensagem;
    }

    public T getDados() {
        return dados;
    }

    public void setDados(T dados) {
        this.dados = dados;
    }
}
