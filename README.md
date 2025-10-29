# Fast Shipping - Web (Exemplo)
Projeto exemplo para sistema de fretes "Fast Shipping".

## Conteúdo
- Frontend: HTML + Bootstrap
- Backend: PHP (MySQL)
- Script SQL para criar o banco em `sql/banco_fast_shipping.sql`
- Arquivo `.env.sample` para configuração do banco

## Instruções rápidas
1. Importe `sql/banco_fast_shipping.sql` no phpMyAdmin (ou crie o banco manualmente).
2. Copie `.env.sample` para `.env` e preencha as credenciais do banco (use seu banco online).
3. Faça upload de todos os arquivos para seu host PHP (ex: 000webhost) ou em XAMPP local.
4. Execute `php/init_admin.php` uma vez para criar a senha hash do admin (senha padrão `123456`).
5. Acesse `index.html` e faça login com `admin@fastshipping.com` / `123456`.

## Observações de segurança
- Este projeto é um exemplo — não o utilize em produção sem revisar segurança.
- Atenção ao uso de prepared statements (já utilizado em inserções).
- Proteja arquivos sensíveis (.env) e use HTTPS.

## Deploy no GitHub
- Suba apenas frontend (HTML/CSS/JS) no GitHub Pages.
- Para o backend em PHP, use um host que suporte PHP/MySQL (000webhost, InfinityFree, etc).
