package com.baozistore;

import com.baozistore.dto.RespostaApi;
import com.baozistore.model.Cliente;
import com.baozistore.model.Pedido;
import com.baozistore.model.Produto;
import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.boot.test.web.client.TestRestTemplate;
import org.springframework.core.ParameterizedTypeReference;
import org.springframework.http.HttpEntity;
import org.springframework.http.HttpMethod;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.test.context.ActiveProfiles;

import java.math.BigDecimal;
import java.time.LocalDate;
import java.util.List;
import java.util.Objects;

import static org.assertj.core.api.Assertions.assertThat;

@SpringBootTest(webEnvironment = SpringBootTest.WebEnvironment.RANDOM_PORT)
@ActiveProfiles("h2")
class BaoziStoreIntegrationTest {

    @Autowired
    private TestRestTemplate restTemplate;

    @Test
    void fluxoCriarClienteProdutoPedidoEListar() {
        String base = "";

        Cliente cliente = new Cliente();
        cliente.setNome("Vitor Renan de Almeida - RU 4379411");
        cliente.setClienteDesde(LocalDate.of(2026, 3, 23));
        ResponseEntity<RespostaApi<Cliente>> clienteResp = restTemplate.exchange(
                base + "/clientes",
                HttpMethod.POST,
                new HttpEntity<>(cliente),
                new ParameterizedTypeReference<RespostaApi<Cliente>>() {});
        assertThat(clienteResp.getStatusCode()).isEqualTo(HttpStatus.CREATED);
        assertThat(Objects.requireNonNull(clienteResp.getBody()).getDados()).isNotNull();
        assertThat(clienteResp.getBody().getDados().getId()).isNotNull();
        Long clienteId = clienteResp.getBody().getDados().getId();

        Produto produto = new Produto();
        produto.setNome("Pão de queijo chinês");
        produto.setPreco(new BigDecimal("4.50"));
        produto.setEstoque(true);
        ResponseEntity<RespostaApi<Produto>> produtoResp = restTemplate.exchange(
                base + "/produtos",
                HttpMethod.POST,
                new HttpEntity<>(produto),
                new ParameterizedTypeReference<RespostaApi<Produto>>() {});
        assertThat(produtoResp.getStatusCode()).isEqualTo(HttpStatus.CREATED);
        Long produtoId = Objects.requireNonNull(produtoResp.getBody()).getDados().getId();

        Pedido pedido = new Pedido();
        pedido.setClienteId(clienteId);
        pedido.setProdutoId(produtoId);
        pedido.setQuantidade(10);
        ResponseEntity<RespostaApi<Pedido>> pedidoResp = restTemplate.exchange(
                base + "/pedidos",
                HttpMethod.POST,
                new HttpEntity<>(pedido),
                new ParameterizedTypeReference<RespostaApi<Pedido>>() {});
        assertThat(pedidoResp.getStatusCode()).isEqualTo(HttpStatus.CREATED);
        assertThat(Objects.requireNonNull(pedidoResp.getBody()).getDados().getQuantidade()).isEqualTo(10);

        assertThat(restTemplate.exchange(
                base + "/clientes",
                HttpMethod.GET,
                null,
                new ParameterizedTypeReference<RespostaApi<List<Cliente>>>() {}).getStatusCode())
                .isEqualTo(HttpStatus.OK);
        assertThat(restTemplate.exchange(
                base + "/produtos",
                HttpMethod.GET,
                null,
                new ParameterizedTypeReference<RespostaApi<List<Produto>>>() {}).getStatusCode())
                .isEqualTo(HttpStatus.OK);
        assertThat(restTemplate.exchange(
                base + "/pedidos",
                HttpMethod.GET,
                null,
                new ParameterizedTypeReference<RespostaApi<List<Pedido>>>() {}).getStatusCode())
                .isEqualTo(HttpStatus.OK);

        RespostaApi<List<Cliente>> listaClientes = restTemplate.exchange(
                base + "/clientes",
                HttpMethod.GET,
                null,
                new ParameterizedTypeReference<RespostaApi<List<Cliente>>>() {}).getBody();
        assertThat(listaClientes).isNotNull();
        assertThat(listaClientes.getDados().stream().anyMatch(c -> clienteId.equals(c.getId()))).isTrue();
    }
}
