#!/bin/sh

DIR="$(cd "$(dirname "$0")" && pwd)"

curl -L -o "$DIR/providers/keycloak-webhook-provider-core.jar" https://github.com/vymalo/keycloak-webhook/releases/download/v0.10.0-rc.1/keycloak-webhook-provider-core-0.10.0-rc.1-all.jar;
curl -L -o "$DIR/providers/keycloak-webhook-provider-http.jar" https://github.com/vymalo/keycloak-webhook/releases/download/v0.10.0-rc.1/keycloak-webhook-provider-http-0.10.0-rc.1-all.jar;
curl -L -o "$DIR/providers/keycloak-webhook-provider-amqp.jar" https://github.com/vymalo/keycloak-webhook/releases/download/v0.10.0-rc.1/keycloak-webhook-provider-amqp-0.10.0-rc.1-all.jar;
# curl -L -o "$DIR/providers/keycloak-to-rabbit-3.0.5.jar" https://github.com/aznamier/keycloak-event-listener-rabbitmq/releases/download/3.0.5/keycloak-to-rabbit-3.0.5.jar;
