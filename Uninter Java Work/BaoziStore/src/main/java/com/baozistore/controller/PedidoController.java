package com.baozistore.controller;

import com.baozistore.dto.RespostaApi;
import com.baozistore.model.Pedido;
import com.baozistore.repository.ClienteRepository;
import com.baozistore.repository.PedidoRepository;
import com.baozistore.repository.ProdutoRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/pedidos")
public class PedidoController {

    @Autowired
    private PedidoRepository pedidoRepository;

    @Autowired
    private ClienteRepository clienteRepository;

    @Autowired
    private ProdutoRepository produtoRepository;

    @PostMapping
    public ResponseEntity<RespostaApi<Pedido>> create(@RequestBody Pedido pedido) {
        if (pedido.getClienteId() == null || pedido.getProdutoId() == null || pedido.getQuantidade() == null) {
            return ResponseEntity.badRequest()
                    .body(RespostaApi.mensagem("clienteId, produtoId e quantidade são obrigatórios."));
        }
        if (pedido.getQuantidade() <= 0) {
            return ResponseEntity.badRequest()
                    .body(RespostaApi.mensagem("quantidade deve ser maior que zero."));
        }
        if (!clienteRepository.existsById(pedido.getClienteId())) {
            return ResponseEntity.status(HttpStatus.BAD_REQUEST)
                    .body(RespostaApi.mensagem("Cliente não encontrado para o id informado."));
        }
        if (!produtoRepository.existsById(pedido.getProdutoId())) {
            return ResponseEntity.status(HttpStatus.BAD_REQUEST)
                    .body(RespostaApi.mensagem("Produto não encontrado para o id informado."));
        }
        Pedido savedPedido = pedidoRepository.save(pedido);
        return ResponseEntity.status(HttpStatus.CREATED)
                .body(RespostaApi.of("Pedido registrado com sucesso.", savedPedido));
    }

    @GetMapping
    public ResponseEntity<RespostaApi<List<Pedido>>> listAll() {
        List<Pedido> lista = pedidoRepository.findAll();
        return ResponseEntity.ok(RespostaApi.of(
                "Lista de pedidos retornada com sucesso (" + lista.size() + " registro(s)).", lista));
    }

    @GetMapping("/{id}")
    public ResponseEntity<RespostaApi<Pedido>> getById(@PathVariable Long id) {
        Optional<Pedido> pedido = pedidoRepository.findById(id);
        return pedido.map(value -> ResponseEntity.ok(RespostaApi.of("Pedido encontrado.", value)))
                .orElseGet(() -> ResponseEntity.status(HttpStatus.NOT_FOUND)
                        .body(RespostaApi.mensagem("Pedido não encontrado para o id informado.")));
    }

    @PutMapping("/{id}")
    public ResponseEntity<RespostaApi<Pedido>> update(@PathVariable Long id, @RequestBody Pedido pedidoDetails) {
        if (pedidoDetails.getClienteId() == null || pedidoDetails.getProdutoId() == null
                || pedidoDetails.getQuantidade() == null) {
            return ResponseEntity.badRequest()
                    .body(RespostaApi.mensagem("clienteId, produtoId e quantidade são obrigatórios."));
        }
        if (pedidoDetails.getQuantidade() <= 0) {
            return ResponseEntity.badRequest()
                    .body(RespostaApi.mensagem("quantidade deve ser maior que zero."));
        }
        if (!clienteRepository.existsById(pedidoDetails.getClienteId())) {
            return ResponseEntity.status(HttpStatus.BAD_REQUEST)
                    .body(RespostaApi.mensagem("Cliente não encontrado para o id informado."));
        }
        if (!produtoRepository.existsById(pedidoDetails.getProdutoId())) {
            return ResponseEntity.status(HttpStatus.BAD_REQUEST)
                    .body(RespostaApi.mensagem("Produto não encontrado para o id informado."));
        }
        return pedidoRepository.findById(id)
                .map(pedido -> {
                    pedido.setClienteId(pedidoDetails.getClienteId());
                    pedido.setProdutoId(pedidoDetails.getProdutoId());
                    pedido.setQuantidade(pedidoDetails.getQuantidade());
                    Pedido updatedPedido = pedidoRepository.save(pedido);
                    return ResponseEntity.ok(RespostaApi.of("Pedido atualizado com sucesso.", updatedPedido));
                })
                .orElseGet(() -> ResponseEntity.status(HttpStatus.NOT_FOUND)
                        .body(RespostaApi.mensagem("Pedido não encontrado para o id informado.")));
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<RespostaApi<Void>> delete(@PathVariable Long id) {
        if (pedidoRepository.existsById(id)) {
            pedidoRepository.deleteById(id);
            return ResponseEntity.ok(RespostaApi.mensagem("Pedido removido com sucesso."));
        }
        return ResponseEntity.status(HttpStatus.NOT_FOUND)
                .body(RespostaApi.mensagem("Pedido não encontrado para o id informado."));
    }
}
