package com.baozistore.controller;

import com.baozistore.dto.RespostaApi;
import com.baozistore.model.Cliente;
import com.baozistore.repository.ClienteRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/clientes")
public class ClienteController {

    @Autowired
    private ClienteRepository clienteRepository;

    @PostMapping
    public ResponseEntity<RespostaApi<Cliente>> create(@RequestBody Cliente cliente) {
        Cliente savedCliente = clienteRepository.save(cliente);
        return ResponseEntity.status(HttpStatus.CREATED)
                .body(RespostaApi.of("Cliente criado com sucesso.", savedCliente));
    }

    @GetMapping
    public ResponseEntity<RespostaApi<List<Cliente>>> listAll() {
        List<Cliente> lista = clienteRepository.findAll();
        return ResponseEntity.ok(RespostaApi.of(
                "Lista de clientes retornada com sucesso (" + lista.size() + " registro(s)).", lista));
    }

    @GetMapping("/{id}")
    public ResponseEntity<RespostaApi<Cliente>> getById(@PathVariable Long id) {
        Optional<Cliente> cliente = clienteRepository.findById(id);
        return cliente.map(value -> ResponseEntity.ok(RespostaApi.of("Cliente encontrado.", value)))
                .orElseGet(() -> ResponseEntity.status(HttpStatus.NOT_FOUND)
                        .body(RespostaApi.mensagem("Cliente não encontrado para o id informado.")));
    }

    @PutMapping("/{id}")
    public ResponseEntity<RespostaApi<Cliente>> update(@PathVariable Long id, @RequestBody Cliente clienteDetails) {
        return clienteRepository.findById(id)
                .map(cliente -> {
                    cliente.setNome(clienteDetails.getNome());
                    cliente.setClienteDesde(clienteDetails.getClienteDesde());
                    Cliente updatedCliente = clienteRepository.save(cliente);
                    return ResponseEntity.ok(RespostaApi.of("Cliente atualizado com sucesso.", updatedCliente));
                })
                .orElseGet(() -> ResponseEntity.status(HttpStatus.NOT_FOUND)
                        .body(RespostaApi.mensagem("Cliente não encontrado para o id informado.")));
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<RespostaApi<Void>> delete(@PathVariable Long id) {
        if (clienteRepository.existsById(id)) {
            clienteRepository.deleteById(id);
            return ResponseEntity.ok(RespostaApi.mensagem("Cliente removido com sucesso."));
        }
        return ResponseEntity.status(HttpStatus.NOT_FOUND)
                .body(RespostaApi.mensagem("Cliente não encontrado para o id informado."));
    }
}
