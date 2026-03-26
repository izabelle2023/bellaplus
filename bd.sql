1. Coleção: chatRooms
SQL
CREATE INDEX idx_chatRooms_participantes_msg_name 
ON chatRooms (
    participantes ASC, 
    ultimaMensagemEm DESC, 
    __name__ ASC
);
2. Coleção: comentarios
SQL
-- Índice por Usuário
CREATE INDEX idx_comentarios_userId_timestamp 
ON comentarios (
    userId ASC, 
    timestamp DESC, 
    __name__ ASC
);

-- Índice por Vídeo
CREATE INDEX idx_comentarios_videoId_timestamp 
ON comentarios (
    videoId ASC, 
    timestamp DESC, 
    __name__ ASC
);
3. Coleção: emotionAnalytics
SQL
-- Cruzamento Usuário e Vídeo
CREATE INDEX idx_emotion_user_video_time 
ON emotionAnalytics (
    userId ASC, 
    videoId ASC, 
    timestamp DESC, 
    __name__ ASC
);

-- Apenas Usuário
CREATE INDEX idx_emotion_userId_time 
ON emotionAnalytics (
    userId ASC, 
    timestamp DESC, 
    __name__ ASC
);

-- Apenas Vídeo
CREATE INDEX idx_emotion_videoId_time 
ON emotionAnalytics (
    videoId ASC, 
    timestamp DESC, 
    __name__ ASC
);
4. Coleção: historico_visualizacoes
SQL
-- Histórico por Usuário
CREATE INDEX idx_hist_userId_time 
ON historico_visualizacoes (
    userId ASC, 
    timestamp DESC, 
    __name__ ASC
);

-- Histórico por Vídeo e Usuário (Cruzado)
CREATE INDEX idx_hist_videoId_time_userId 
ON historico_visualizacoes (
    videoId ASC, 
    timestamp DESC, 
    userId ASC, 
    __name__ ASC
);