package com.baozistore.controller;

import com.baozistore.dto.RespostaApi;
import com.baozistore.model.Produto;
import com.baozistore.repository.ProdutoRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/produtos")
public class ProdutoController {

    @Autowired
    private ProdutoRepository produtoRepository;

    @PostMapping
    public ResponseEntity<RespostaApi<Produto>> create(@RequestBody Produto produto) {
        Produto savedProduto = produtoRepository.save(produto);
        return ResponseEntity.status(HttpStatus.CREATED)
                .body(RespostaApi.of("Produto criado com sucesso.", savedProduto));
    }

    @GetMapping
    public ResponseEntity<RespostaApi<List<Produto>>> listAll() {
        List<Produto> lista = produtoRepository.findAll();
        return ResponseEntity.ok(RespostaApi.of(
                "Lista de produtos retornada com sucesso (" + lista.size() + " registro(s)).", lista));
    }

    @GetMapping("/{id}")
    public ResponseEntity<RespostaApi<Produto>> getById(@PathVariable Long id) {
        Optional<Produto> produto = produtoRepository.findById(id);
        return produto.map(value -> ResponseEntity.ok(RespostaApi.of("Produto encontrado.", value)))
                .orElseGet(() -> ResponseEntity.status(HttpStatus.NOT_FOUND)
                        .body(RespostaApi.mensagem("Produto não encontrado para o id informado.")));
    }

    @PutMapping("/{id}")
    public ResponseEntity<RespostaApi<Produto>> update(@PathVariable Long id, @RequestBody Produto produtoDetails) {
        return produtoRepository.findById(id)
                .map(produto -> {
                    produto.setNome(produtoDetails.getNome());
                    produto.setPreco(produtoDetails.getPreco());
                    produto.setEstoque(produtoDetails.getEstoque());
                    Produto updatedProduto = produtoRepository.save(produto);
                    return ResponseEntity.ok(RespostaApi.of("Produto atualizado com sucesso.", updatedProduto));
                })
                .orElseGet(() -> ResponseEntity.status(HttpStatus.NOT_FOUND)
                        .body(RespostaApi.mensagem("Produto não encontrado para o id informado.")));
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<RespostaApi<Void>> delete(@PathVariable Long id) {
        if (produtoRepository.existsById(id)) {
            produtoRepository.deleteById(id);
            return ResponseEntity.ok(RespostaApi.mensagem("Produto removido com sucesso."));
        }
        return ResponseEntity.status(HttpStatus.NOT_FOUND)
                .body(RespostaApi.mensagem("Produto não encontrado para o id informado."));
    }
}
