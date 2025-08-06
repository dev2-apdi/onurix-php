# Ejemplos de Cliente API de Onurix en PHP

[![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?style=flat&logo=php&logoColor=white)](https://php.net)
[![License](https://img.shields.io/badge/License-Proprietary-red?style=flat)](LICENSE)

![Onurix Logo](https://cdn.onurix.com/web/assets/img/logo50.png)

Este repositorio contiene ejemplos de código en PHP para interactuar con la **API de Onurix**. Está diseñado para ayudarte a integrar fácilmente los servicios de Onurix (SMS, Llamadas, WhatsApp, etc.) en tus aplicaciones PHP.

## 📋 Tabla de Contenido

- [Prerrequisitos](#-prerrequisitos)
- [Estructura del Repositorio](#-estructura-del-repositorio)
- [Uso](#-uso)
- [Configuración de Parámetros](#️-configuración-de-parámetros)
- [Documentación Completa de la API](#-documentación-completa-de-la-api)
- [Licencia](#-licencia)
- [Soporte](#-soporte)

## ⚙️ Prerrequisitos

Antes de empezar, asegúrate de tener instalado lo siguiente:
- **PHP 8.0 o superior**
- **Composer** (para gestionar las dependencias)

## 📂 Estructura del Repositorio

Los ejemplos de código están organizados en carpetas que corresponden a las diferentes categorías de la API de Onurix. Esta estructura te permite encontrar fácilmente el ejemplo que necesitas.

- **/calls**:
  - `SendCall.php`: Genera una llamada con un mensaje de voz.
  - `SendCALL2FA.php`: Genera y entrega un código de verificación 2FA a través de una llamada.
- **/general**:
  - `Balance.php`: Consulta el saldo de créditos de la cuenta.
  - `Security.php`: Bloquea un número de teléfono para no recibir comunicaciones.
  - `VerificationCode2FA.php`: Realiza la verificación de un código 2FA.
  - `VerificationMessage.php`: Verifica el estado de un envío de SMS o llamada.
- **/groups_and_contacts**:
  - `AssociateContactToGroup.php`: Asocia un contacto a un grupo.
  - `ContactCreate.php`: Crea un nuevo contacto.
  - `ContactDelete.php`: Elimina un contacto.
  - `ContactGroupList.php`: Lista los contactos de un grupo.
  - `ContactUpdate.php`: Actualiza la información de un contacto.
  - `DissasociateContactToGroup.php`: Desasocia un contacto de un grupo.
  - `GroupCreate.php`: Crea un nuevo grupo de contactos.
  - `GroupDelete.php`: Elimina un grupo de contactos.
  - `GroupList.php`: Lista todos los grupos de la cuenta.
  - `GroupUpdate.php`: Actualiza el nombre de un grupo.
- **/sms**:
  - `SendSMS.php`: Envía un mensaje de texto (SMS).
  - `SendSMS2FA.php`: Envía un mensaje de texto (SMS) con un código de verificación 2FA.
- **/url**:
  - `Statistics.php`: Obtiene las estadísticas de una URL corta.
  - `URLShortener.php`: Crea una URL corta.
- **/whatsapp**:
  - `SendWhatsApp2FA.php`: Envía un mensaje de WhatsApp con un código de verificación 2FA.
  - `WhatsAppGeneralSend.php`: Envía un mensaje de WhatsApp usando una plantilla.

## 📖 Uso

1.  **Clona el repositorio e instala las dependencias:**
    Este proyecto utiliza [Guzzle](https://github.com/guzzle/guzzle) como cliente HTTP.
    ```bash
    git clone https://github.com/onurixlatam/onurix-php.git
    cd onurix-php
    composer install
    ```

2.  **Navega al archivo** del endpoint que deseas utilizar (ej. `sms/SendSMS.php`).

3.  **Edita el archivo** y reemplaza los valores de los placeholders como se explica en la sección de [Configuración de Parámetros](#️-configuración-de-parámetros).

4.  **Ejecuta el script** desde tu terminal:
    ```bash
    php sms/SendSMS.php
    ```

5.  **Verifica la respuesta** que se imprimirá en la consola.

## ⚙️ Configuración de Parámetros

Para usar los ejemplos, necesitas reemplazar los valores de los placeholders (`AQUI_...`) con tus datos reales. A continuación, se detallan los parámetros que encontrarás en los scripts:

### Credenciales de Autenticación (Obligatorias)

| Parámetro | Descripción |
| :--- | :--- |
| `client` | Tu ID de Cliente. Lo encuentras en tu panel de Onurix en `Seguridad API`. |
| `key` | Tu Llave de API. La encuentras en tu panel de Onurix en `Seguridad API`. |

### Parámetros Comunes

| Parámetro | Descripción | Ejemplo |
| :--- | :--- | :--- |
| `phone` | Número de teléfono de destino. Para múltiples números, sepáralos por comas. | `573001234567` o `573001234567,573001234568` |
| `name` | Nombre para un contacto o grupo. | `Mi Grupo` |
| `lastname` | Apellido para un contacto. | `Pérez` |
| `email` | Correo electrónico de un contacto. | `ejemplo@email.com` |
| `id` | ID de un recurso (mensaje, contacto, grupo). | `12345` |
| `group-id` | ID de un grupo. | `6789` |
| `groups` | IDs de grupos separados por comas. | `1,2,3` |
| `app-name` | Nombre de la aplicación 2FA creada en Onurix. | `MiApp` |

### Parámetros Específicos

| Servicio | Parámetro | Descripción |
| :--- | :--- | :--- |
| **SMS** | `sms` | Contenido del mensaje de texto a enviar. |
| **Llamadas** | `message` | Mensaje que se reproducirá en la llamada. |
| **Llamadas** | `voice` | Voz a usar en la llamada (ej. `Mariana`, `Penelope`). |
| **Llamadas** | `audio-code` | ID de un audio previamente cargado en la plataforma. |
| **URL** | `url-long` | La URL original que deseas acortar. |
| **URL** | `alias` | (Opcional) Alias personalizado para la URL corta. |
| **WhatsApp** | `templateId` | ID de la plantilla de WhatsApp aprobada por Meta. |
| **WhatsApp** | `data` | Un array de PHP que se convertirá a JSON con los valores para la plantilla. |

**Ejemplo de `$data` para WhatsApp:**

```php
$data = [
    "phones" => "573001234567",
    "body" => [
        1 => ["type" => "text", "value" => "John Doe"],
        2 => ["type" => "text", "value" => "ORD-12345"]
    ]
];
```

## 📚 Documentación Completa de la API

Para obtener una descripción detallada de todos los endpoints, parámetros y respuestas de la API, por favor consulta nuestra documentación oficial en [https://docs.onurix.com/](https://docs.onurix.com/).

## 📄 Licencia

Este proyecto es software propietario. Todos los derechos reservados por Onurix LATAM.

## 📞 Soporte

Para soporte y preguntas, no dudes en contactarnos:
- **Email**: soporte@aplicacionesdinamicas.com
- **Website**: [https://onurix.com](https://onurix.com)
