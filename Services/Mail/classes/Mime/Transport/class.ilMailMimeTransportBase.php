<?php declare(strict_types=1);

/* Copyright (c) 1998-2017 ILIAS open source, Extended GPL, see docs/LICENSE */

use PHPMailer\PHPMailer\PHPMailer;

/**
 * Class ilMailMimeTransportBase
 */
abstract class ilMailMimeTransportBase implements ilMailMimeTransport
{
    /** @var PHPMailer */
    protected $mailer;

    /** @var ilSetting $settings */
    protected $settings;

    /** @var ilAppEventHandler */
    private $eventHandler;

    /**
     * ilMailMimeTransportBase constructor.
     * @param ilSetting $settings
     * @param ilAppEventHandler $eventHandler
     */
    public function __construct(ilSetting $settings, ilAppEventHandler $eventHandler)
    {
        $this->settings = $settings;
        $this->eventHandler = $eventHandler;

        $mail = new PHPMailer();
        $this->setMailer($mail);
    }

    /**
     * @return PHPMailer
     */
    protected function getMailer() : PHPMailer
    {
        return $this->mailer;
    }

    /**
     * @param PHPMailer $mailer
     */
    protected function setMailer(PHPMailer $mailer) : void
    {
        $this->mailer = $mailer;
    }

    protected function resetMailer() : void
    {
        $this->getMailer()->clearAllRecipients();
        $this->getMailer()->clearAttachments();
        $this->getMailer()->clearReplyTos();
        $this->getMailer()->ErrorInfo = '';
    }

    /**
     *
     */
    protected function onBeforeSend() : void
    {
    }

    /**
     * @inheritdoc
     */
    final public function send(ilMimeMail $mail) : bool
    {
        $this->resetMailer();

        $this->getMailer()->XMailer = ' ';

        foreach ($mail->getTo() as $recipients) {
            $recipient_pieces = array_filter(array_map('trim', explode(',', $recipients)));
            foreach ($recipient_pieces as $recipient) {
                if (!$this->getMailer()->AddAddress($recipient, '')) {
                    ilLoggerFactory::getLogger('mail')->warning($this->getMailer()->ErrorInfo);
                }
            }
        }

        foreach ($mail->getCc() as $carbon_copies) {
            $cc_pieces = array_filter(array_map('trim', explode(',', $carbon_copies)));
            foreach ($cc_pieces as $carbon_copy) {
                if (!$this->getMailer()->AddCC($carbon_copy, '')) {
                    ilLoggerFactory::getLogger('mail')->warning($this->getMailer()->ErrorInfo);
                }
            }
        }

        foreach ($mail->getBcc() as $blind_carbon_copies) {
            $bcc_pieces = array_filter(array_map('trim', explode(',', $blind_carbon_copies)));
            foreach ($bcc_pieces as $blind_carbon_copy) {
                if (!$this->getMailer()->AddBCC($blind_carbon_copy, '')) {
                    ilLoggerFactory::getLogger('mail')->warning($this->getMailer()->ErrorInfo);
                }
            }
        }

        $this->getMailer()->Subject = $mail->getSubject();

        if ($mail->getFrom()->hasReplyToAddress()) {
            if (!$this->getMailer()->addReplyTo($mail->getFrom()->getReplyToAddress(), $mail->getFrom()->getReplyToName())) {
                ilLoggerFactory::getLogger('mail')->warning($this->getMailer()->ErrorInfo);
            }
        }
        if ($mail->getFrom()->hasEnvelopFromAddress()) {
            $this->getMailer()->Sender = $mail->getFrom()->getEnvelopFromAddress();
        }

        if (!$this->getMailer()->setFrom($mail->getFrom()->getFromAddress(), $mail->getFrom()->getFromName(), false)) {
            ilLoggerFactory::getLogger('mail')->warning($this->getMailer()->ErrorInfo);
        }

        foreach ($mail->getAttachments() as $attachment) {
            if (!$this->getMailer()->AddAttachment($attachment['path'], $attachment['name'])) {
                ilLoggerFactory::getLogger('mail')->warning($this->getMailer()->ErrorInfo);
            }
        }

        foreach ($mail->getImages() as $image) {
            if (!$this->getMailer()->AddEmbeddedImage($image['path'], $image['cid'], $image['name'])) {
                ilLoggerFactory::getLogger('mail')->warning($this->getMailer()->ErrorInfo);
            }
        }

        if ($mail->getFinalBodyAlt()) {
            $this->getMailer()->IsHTML(true);
            $this->getMailer()->AltBody = $mail->getFinalBodyAlt();
            $this->getMailer()->Body = $mail->getFinalBody();
        } else {
            $this->getMailer()->IsHTML(false);
            $this->getMailer()->AltBody = '';
            $this->getMailer()->Body = $mail->getFinalBody();
        }

        ilLoggerFactory::getLogger('mail')->info(sprintf(
            "Trying to delegate external email delivery:" .
            " Initiated by: %s (%s) " .
            "| To: %s | CC: %s | BCC: %s | Subject: %s " .
            "| From: %s / %s " .
            "| ReplyTo: %s / %s " .
            "| EnvelopeFrom: %s",
            $GLOBALS['DIC']->user()->getLogin(),
            $GLOBALS['DIC']->user()->getId(),
            implode(', ', $mail->getTo()),
            implode(', ', $mail->getCc()),
            implode(', ', $mail->getBcc()),
            $mail->getSubject(),
            $mail->getFrom()->getFromAddress(),
            $mail->getFrom()->getFromName(),
            $mail->getFrom()->getReplyToAddress(),
            $mail->getFrom()->getReplyToName(),
            $mail->getFrom()->getEnvelopFromAddress()
        ));

        ilLoggerFactory::getLogger('mail')->debug(sprintf("Mail Alternative Body: %s", $this->getMailer()->AltBody));
        ilLoggerFactory::getLogger('mail')->debug(sprintf("Mail Body: %s", $this->getMailer()->Body));

        $this->getMailer()->CharSet = 'utf-8';

        $this->mailer->SMTPDebug = 4;
        $this->mailer->Debugoutput = function ($message, $level) {
            if (
                strpos($message, 'Invalid address') !== false ||
                strpos($message, 'Message body empty') !== false
            ) {
                ilLoggerFactory::getLogger('mail')->warning($message);
            } else {
                ilLoggerFactory::getLogger('mail')->debug($message);
            }
        };

        $this->onBeforeSend();
        $result = $this->getMailer()->Send();
        if ($result) {
            ilLoggerFactory::getLogger('mail')->info(sprintf(
                'Successfully delegated external mail delivery'
            ));

            if (strlen($this->getMailer()->ErrorInfo) > 0) {
                ilLoggerFactory::getLogger('mail')->warning(sprintf(
                    '... with most recent errors: %s',
                    $this->getMailer()->ErrorInfo
                ));
            }
        } else {
            ilLoggerFactory::getLogger('mail')->warning(sprintf(
                'Could not deliver external email: %s',
                $this->getMailer()->ErrorInfo
            ));
        }

        $this->eventHandler->raise('Services/Mail', 'externalEmailDelegated', [
            'mail' => $mail,
            'result' => (bool) $result
        ]);

        return (bool) $result;
    }
}
