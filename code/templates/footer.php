
</div>

<script src="static/lib/bootstrap-5.3.3/js/bootstrap.min.js"></script>

<?php if (isset($template['scripts']) && is_array($template['scripts'])): ?>
    <?php foreach ($template['scripts'] as $script): ?>
        <script src="<?php echo htmlspecialchars($script); ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>